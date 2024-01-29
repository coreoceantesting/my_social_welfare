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
use \Mpdf\Mpdf;

class DivyangController extends Controller
{

    public function index()
    {
        // $hayat = HayatFormModel::where('deleted_at', null)->first();
        $hayat = HayatFormModel::latest()->get();
        $users = User::where('id', Auth::user()->id)->first();
        $fy = FinancialMst::where('is_active', 1)->whereNull('deleted_at')->first();
        return view('admin.masters.divyaglist')->with(['users'=> $users, 'hayat' => $hayat, 'fy'=>$fy]);

    }

    public function store(HayatiRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();

            if($request->hasFile("signature")){

                $imagePath=$request->file("signature");

                $image=time().'_'.$imagePath->getClientOriginalName();

                $imagePath->move('signature/',$image);

                 $input['signature'] = $imagePath;

            }

            HayatFormModel::create( Arr::only( $input, HayatFormModel::getFillables() ) );
            DB::commit();
            // $users = User::where('id', Auth::user()->id)->first();
            return response()->json(['success' => 'Haytich Form submitted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Hayat Form');
        }
    }


    public function show($id)
{
        // $hayat = HayatFormModel::where('user_id', Auth::user()->id)->first();
        $hayat = HayatFormModel::join('users', 'hayticha_form.user_id', '=', 'users.id')
                    ->where('hayticha_form.user_id', Auth::user()->id)
                    ->select('hayticha_form.*', 'users.*') // Adjust column_name
                    ->first();

         // Using mpdf/mpdf
        // $pdf = new Mpdf();
        // $pdf->WriteHTML(view('admin.masters.divyagformpdf', compact('hayat'))->render());
        // $pdfData = $pdf->Output('', 'S'); // Output as string
        // $pdfName = 'document.pdf';

        // // Return the PDF for download
        // return response($pdfData)
        //     ->header('Content-Type', 'application/pdf')
        //     ->header('Content-Disposition', 'inline; filename="' . $pdfName . '"');

        return view('admin.masters.divyagformpdf')->with(['hayat'=> $hayat]);
}

 public function edit(HayatFormModel $hayatichaDakhlaform)
    {
        // $hayat = HayatFormModel::find($id);
        //print_r($hayat);exit;
        if ($hayatichaDakhlaform)
        {
            $response = [
                'result' => 1,
                'hayatichaDakhlaform' => $hayatichaDakhlaform,
            ];
        }
        else
        {
            $response = ['result' => 0];
        }


        return $response;

    }

    public function update(UpdateHayatiRequest $request, HayatFormModel $hayatichaDakhlaform)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();


            if ($request->hasFile('signature')) {

                $path1='signature/'.$input['signature'];

                if(File::exists($path1)){

                    File::delete($path1);
                }
                $file1 = $request->file('signature');

                $ext1=$file1->getClientOriginalName();

                $filename1=time().'.'.$ext1;

                $file1->move('signature/', $filename1);

                $input['signature'] = $filename1;

            }

            if ($request->hasFile('pdfPath')) {

                $pathd='sign_uploaded_live_certificate/'.$input['pdfPath'];

                if(File::exists($pathd)){

                    File::delete($pathd);
                }
                $filed = $request->file('pdfPath');

                $extd=$filed->getClientOriginalName();

                $filenamed=time().'.'.$extd;

                $filed->move('sign_uploaded_live_certificate/', $filenamed);

                $input['pdfPath'] = $filenamed;

            }


            if ($request->hasFile('sign_uploaded_live_certificate')) {

                $path='sign_uploaded_live_certificate/'.$input['sign_uploaded_live_certificate'];

                if(File::exists($path)){

                    File::delete($path);
                }
                $file = $request->file('sign_uploaded_live_certificate');

                $ext=$file->getClientOriginalName();

                $filename=time().'.'.$ext;

                $file->move('sign_uploaded_live_certificate/', $filename);

                $input['sign_uploaded_live_certificate'] = $filename;

            }


            $hayatichaDakhlaform->update( Arr::only( $input, HayatFormModel::getFillables() ) );
            DB::commit();

            return response()->json(['success'=> 'Life certificate updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'Life certificate');
        }
    }

    public function destroy(HayatFormModel $hayatichaDakhlaform)
    {
        try
        {
            DB::beginTransaction();
            $hayatichaDakhlaform->delete();
            DB::commit();

            return response()->json(['success'=> 'Life Certificate deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'Life Certificate');
        }
    }

    public function hayatuploadfile(UpdateHayatiRequest $request, HayatFormModel $hayatichaDakhlaform)
    {

        try {
            DB::beginTransaction();

            // Validate the request and get the input data
            $input = $request->validated();

            // Handle file upload
            if ($request->hasFile('sign_uploaded_live_certificate')) {
                $imagePath = $request->file('sign_uploaded_live_certificate')->store('sign_uploaded_live_certificate', 'public');
                $input['sign_uploaded_live_certificate'] = $imagePath;
            }

            // Update the model
            $hayatichaDakhlaform->update($input);

            DB::commit();

            return response()->json(['success' => 'Signatured Life certificate updated successfully!']);
        } catch (\Exception $e) {
            DB::rollBack();

            return $this->respondWithAjax($e, 'updating', 'Life certificate');
        }
    }




}