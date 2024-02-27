<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Admin\Controller;

use App\Http\Requests\Admin\Masters\HayatiRequest;
use App\Http\Requests\Admin\Masters\UpdateHayatiRequest;
use App\Models\HayatFormModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\FinancialMst;
use PDF;


class DivyangController extends Controller
{

    public function index()
    {
        $hayat = HayatFormModel::where('user_id', Auth::user()->id)->latest()->get();
        $users = User::where('id', Auth::user()->id)->first();
        $fy = FinancialMst::where('is_active', 1)->first();
        return view('admin.masters.divyaglist')->with(['users' => $users, 'hayat' => $hayat, 'fy' => $fy]);
    }

    public function store(HayatiRequest $request)
    {
        try {

            DB::beginTransaction();
            $input = $request->validated();
            if ($request->hasFile('signature')) {
                $imagePath = $request->file('signature')->store('signature', 'public');
                $input['signature'] = $imagePath;
            }

            $hayatForm = HayatFormModel::create(Arr::only($input, HayatFormModel::getFillables()));
            DB::commit();

            $hayat = HayatFormModel::join('users', 'hayticha_form.user_id', '=', 'users.id')
                ->where('hayticha_form.h_id', $hayatForm->h_id)
                ->select('hayticha_form.*', 'users.*')
                ->first();
            $pdf = PDF::loadView('admin.masters.divyagformpdf', compact('hayat'));
            $fileName = 'live_certificate' . $hayatForm->h_id . '.pdf';
            $filePath = public_path('pdfs/' . $fileName);
            $pdf->save($filePath);

            if (file_exists($filePath)) {
                $url = asset('pdfs/' . $fileName);
                HayatFormModel::where('h_id', $hayatForm->h_id)->update(['download_pdf' => $fileName]);

                return response()->json(['success' => 'Life certificate Form submitted successfully!', 'data' => $hayatForm, 'file_path' =>  $url]);
            } else {
                throw new \Exception('Failed to save the PDF file.');
            }
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'creating', 'Hayat Form');
        }
    }


    public function edit(HayatFormModel $hayatichaDakhlaform)
    {
        if ($hayatichaDakhlaform) {
            $response = [
                'result' => 1,
                'hayatichaDakhlaform' => $hayatichaDakhlaform,
            ];
        } else {
            $response = ['result' => 0];
        }
        return $response;
    }

    public function update(UpdateHayatiRequest $request, HayatFormModel $hayatichaDakhlaform)
    {
        try {
            DB::beginTransaction();
            $input = $request->validated();


            if ($request->hasFile('signature')) {
                $imagePath = $request->file('signature')->store('signature', 'public');
                $input['signature'] = $imagePath;
            }

            $hayatichaDakhlaform->update(Arr::only($input, HayatFormModel::getFillables()));
            DB::commit();

            $hayat = HayatFormModel::join('users', 'hayticha_form.user_id', '=', 'users.id')
                ->where('hayticha_form.h_id', $hayatichaDakhlaform->h_id)
                ->select('hayticha_form.*', 'users.*')
                ->first();
            $pdf = PDF::loadView('admin.masters.divyagformpdf', compact('hayat'));
            $fileName = 'live_certificate' . $hayatichaDakhlaform->h_id . '.pdf';
            $filePath = public_path('pdfs/' . $fileName);
            $pdf->save($filePath);

            if (file_exists($filePath)) {
                $url = asset('pdfs/' . $fileName);
                HayatFormModel::where('h_id', $hayatichaDakhlaform->h_id)->update(['download_pdf' => $fileName]);

                return response()->json(['success' => 'Life certificate updated successfully!', 'data' => $hayatichaDakhlaform, 'file_path' =>  $url]);
            } else {
                throw new \Exception('Failed to save the PDF file.');
            }
            // return response()->json(['success' => 'Life certificate updated successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'updating', 'Life certificate');
        }
    }

    public function destroy(HayatFormModel $hayatichaDakhlaform)
    {
        try {
            DB::beginTransaction();
            $hayatichaDakhlaform->delete();
            DB::commit();

            return response()->json(['success' => 'Life Certificate deleted successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'deleting', 'Life Certificate');
        }
    }

    public function hayatuploadfile(Request $request)
    {

        try {
            DB::beginTransaction();

            $validatedData = $request->validate([
                'sign_uploaded_live_certificate' => 'required',
            ]);

            if ($request->hasFile('sign_uploaded_live_certificate')) {
                $imagePath = $request->file('sign_uploaded_live_certificate')->store('sign_uploaded_live_certificate', 'public');
                $input['sign_uploaded_live_certificate'] = $imagePath;
            }

            DB::table('hayticha_form')->where('h_id', $request->upload_model_id)->update([
                'sign_uploaded_live_certificate' => $input['sign_uploaded_live_certificate'],
            ]);

            DB::commit();

            return response()->json(['success' => 'Signatured Life certificate updated successfully!']);
        } catch (\Exception $e) {
            DB::rollBack();

            return $this->respondWithAjax($e, 'updating', 'Life certificate');
        }
    }


    public function pdf()
    {
        return view('admin.masters.pdf');
    }
}