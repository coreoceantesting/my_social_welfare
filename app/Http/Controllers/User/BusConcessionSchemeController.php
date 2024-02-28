<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\User\StoreBusConcessionRequest;
use App\Http\Requests\User\UpdateBusConcessionRequest;
use App\Models\BusConcession;
use App\Models\BusConcessionDocuments_model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\HayatFormModel;


class BusConcessionSchemeController extends Controller
{
    public function list()
    {
        $bus_concession = BusConcession::where('created_by', Auth::user()->id)->latest()->get();
        return view('users.bus_concession.application_list')->with(['bus_concession' => $bus_concession,]);
    }

    public function index()
    {
        $userCategory = Auth::user()->category;
        if ($userCategory == 1 || $userCategory == 2) {
            $data = HayatFormModel::where('user_id', Auth::user()->id)
                ->latest()
                ->first();

            if (empty($data)) {
                return redirect()->route('hayatichaDakhlaform.index')->with('warning', 'Fill the first form before proceeding.');
            } elseif ($data->sign_uploaded_live_certificate == "") {
                return redirect()->route('hayatichaDakhlaform.index')->with('warning', 'Your Application status is still Pending');
            } else {
                $bus_concession = BusConcession::where('created_by', Auth::user()->id)->latest()->first();

                if (!empty($bus_concession)) {
                    return redirect('bus_concession_application')->with('warning', 'You Have already apply for this form');
                }

                $document = DB::table('document_type_msts')
                    ->where('scheme_id', 2)
                    ->whereNull('deleted_at')
                    ->orderBy('created_at', 'DESC')
                    ->get();

                return view('users.bus_concession.bus_concession')->with(['document' => $document]);
            }
        } else {
            $bus_concession = BusConcession::where('created_by', Auth::user()->id)->latest()->first();

            if (!empty($bus_concession)) {
                return redirect('bus_concession_application')->with('warning', 'You Have already apply for this form');
            }
            $document = DB::table('document_type_msts')
                ->where('scheme_id', 2)
                ->whereNull('deleted_at')
                ->orderBy('created_at', 'DESC')
                ->get();

            return view('users.bus_concession.bus_concession')->with(['document' => $document]);
        }
    }

    public function store(StoreBusConcessionRequest $request)
    {
        try {
            DB::beginTransaction();
            $input = $request->validated();

            if ($request->hasFile('candidate_signature')) {
                $imagePath = $request->file('candidate_signature')->store('bus_concession_file/candidate_signature', 'public');
                $input['candidate_signature'] = $imagePath;
            }

            if ($request->hasFile('passport_size_photo')) {
                $imagePath1 = $request->file('passport_size_photo')->store('bus_concession_file/passport_size_photo', 'public');
                $input['passport_size_photo'] = $imagePath1;
            }

            $unique_id = "BUS-SCH" . rand(100000, 10000000);
            $input['application_no'] = $unique_id;
            $bus_concession = BusConcession::create(Arr::only($input, BusConcession::getFillables()));

            $documentTypeIds = $request->input('document_id');
            if ($request->hasFile("document_file")) {
                $files = $request->file("document_file");
                foreach ($files as $key => $file) {
                    $documentTypeId = $documentTypeIds[$key];
                    $imageName = time() . '_' . $file->getClientOriginalName();
                    $file->move('bus_concession_file/', $imageName);
                    BusConcessionDocuments_model::create([
                        "document_file" => $imageName,
                        'document_id' => $documentTypeId,
                        "bus_concession_id" => $bus_concession->id,
                    ]);
                }
            }

            DB::commit();
            return response()->json(['success' => 'Bus Concession created successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'creating', 'Bus Concession');
        }
    }


    public function edit(BusConcession $bus_concession)
    {

        $bus_concession->load(['busConcessionSchemeDocuments.document']);
        if ($bus_concession) {
            $response = [
                'result' => 1,
                'bus_concession' => $bus_concession,
                'documents' => $bus_concession->busConcessionSchemeDocuments,
            ];
        } else {
            $response = ['result' => 0];
        }
        return $response;
    }

    public function update(UpdateBusConcessionRequest $request, BusConcession $bus_concession)
    {
        try {
            DB::beginTransaction();
            $input = $request->validated();

            if ($request->hasFile('candidate_signature')) {
                $imagePath = $request->file('candidate_signature')->store('bus_concession_file/candidate_signature', 'public');
                $input['candidate_signature'] = $imagePath;
            }

            if ($request->hasFile('passport_size_photo')) {
                $imagePath1 = $request->file('passport_size_photo')->store('bus_concession_file/passport_size_photo', 'public');
                $input['passport_size_photo'] = $imagePath1;
            }

            if (
                $bus_concession['hod_status'] == 1 && $bus_concession['ac_status'] == 1 && $bus_concession['amc_status'] == 1 && $bus_concession['dmc_status'] == 2
                || $bus_concession['hod_status'] == 1 && $bus_concession['ac_status'] == 1 && $bus_concession['amc_status'] == 2 && $bus_concession['dmc_status'] == 1
                || $bus_concession['hod_status'] == 1 && $bus_concession['ac_status'] == 2 && $bus_concession['amc_status'] == 1 && $bus_concession['dmc_status'] == 1
                || $bus_concession['hod_status'] == 2 && $bus_concession['ac_status'] == 1 && $bus_concession['amc_status'] == 1 && $bus_concession['dmc_status'] == 1
                || $bus_concession['hod_status'] == 2 && $bus_concession['ac_status'] == 2 && $bus_concession['amc_status'] == 2 && $bus_concession['dmc_status'] == 2
                || $bus_concession['hod_status'] == 1 && $bus_concession['ac_status'] == 1 && $bus_concession['amc_status'] == 1 && $bus_concession['dmc_status'] == 2
                || $bus_concession['hod_status'] == 1 && $bus_concession['ac_status'] == 2 && $bus_concession['amc_status'] == 0 && $bus_concession['dmc_status'] == 0
                || $bus_concession['hod_status'] == 2 && $bus_concession['ac_status'] == 0 && $bus_concession['amc_status'] == 0 && $bus_concession['dmc_status'] == 0
                || $bus_concession['hod_status'] == 1 && $bus_concession['ac_status'] == 1 && $bus_concession['amc_status'] == 2 && $bus_concession['dmc_status'] == 0
            ) {
                $bus_concession['hod_status'] = 0;
                $bus_concession['ac_status']  = 0;
                $bus_concession['amc_status'] = 0;
                $bus_concession['dmc_status'] = 0;
            }

            $bus_concession->update(Arr::only($input, BusConcession::getFillables()));
            DB::commit();
            return response()->json(['success' => 'Bus Concession updated successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'updating', 'Bus Concession');
        }
    }


    public function destroy(BusConcession $bus_concession)
    {
        try {
            DB::beginTransaction();
            $bus_concession->delete();
            DB::commit();
            return response()->json(['success' => 'Bus Concession deleted successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'deleting', 'Bus Concession');
        }
    }

    public function busConcessionApplicationView($id)
    {

        $data =  DB::table('trans_bus_concession_scheme AS t1')
            ->where('t1.id', '=', $id)
            ->whereNull('t1.deleted_at')
            ->orderBy('t1.id', 'DESC')
            ->first();

        $document = DB::table('trans_bus_concession_scheme_documents AS t1')
            ->select('t1.*', 't2.document_name')
            ->leftJoin('document_type_msts AS t2', 't2.id', '=', 't1.document_id')
            ->whereNull('t1.deleted_at')
            ->where('t1.bus_concession_id', $data->id)
            ->get();

        return view('users.bus_concession.view', compact('data', 'document'));
    }

    public function generateCertificate($id)
    {

        $data =  DB::table('trans_bus_concession_scheme AS t1')
            ->where('t1.id', '=', $id)
            ->whereNull('t1.deleted_at')
            ->orderBy('t1.id', 'DESC')
            ->first();

        return view('users.bus_concession.generate_certificate', compact('data'));
    }

    public function busConcessionCertificate($id)
    {

        $data =  DB::table('trans_bus_concession_scheme AS t1')
            ->where('t1.id', '=', $id)
            ->whereNull('t1.deleted_at')
            ->orderBy('t1.id', 'DESC')
            ->first();

        $document = DB::table('trans_bus_concession_scheme_documents AS t1')
            ->select('t1.*', 't2.document_name')
            ->leftJoin('document_type_msts AS t2', 't2.id', '=', 't1.document_id')
            ->whereNull('t1.deleted_at')
            ->where('t1.bus_concession_id', $data->id)
            ->get();

        $scheme = DB::table('mst_scheme')->select('*')->where('id', 2)->whereNull('deleted_at')->first();
        return view('users.bus_concession.bus_concession_certificate_view', compact('data', 'document', 'scheme'));
    }
}