<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreSportsRequest;
use App\Http\Requests\User\UpdateSportsRequest;
use App\Models\SportsScheme;
use App\Models\SportsSchemeDocuments_model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SportsSchemeController extends Controller
{
    public function list()
    {
        $sports = SportsScheme::where('created_by', Auth::user()->id)->latest()->get();
        return view('users.sports_scheme.application_list')->with(['sports' => $sports]);
    }

    public function index(Request $request)
    {
        $scheme_id = session('scheme_id');
        // dd($scheme_id);
        $sports = SportsScheme::where('created_by', Auth::user()->id)->latest()->first();
        if (!empty($sports)) {
            return redirect('sports_scheme_application')->with('warning', 'You Have already apply for this form');
        }
        $document = DB::table('document_type_msts')
            ->where('scheme_id', $scheme_id)
            ->whereNull('deleted_at')
            ->orderBy('created_at', 'DESC')
            ->get();
        return view('users.sports_scheme.sports_scheme')->with(['document' => $document]);
    }

    public function store(StoreSportsRequest $request)
    {
        try {
            DB::beginTransaction();
            $input = $request->validated();

            if ($request->hasFile('candidate_signature')) {
                $imagePath = $request->file('candidate_signature')->store('sports_scheme_file/candidate_signature', 'public');
                $input['candidate_signature'] = $imagePath;
            }

            if ($request->hasFile('passport_size_photo')) {
                $imagePath1 = $request->file('passport_size_photo')->store('sports_scheme_file/passport_size_photo', 'public');
                $input['passport_size_photo'] = $imagePath1;
            }

            $unique_id = "SPO-SCH" . rand(100000, 10000000);
            $input['application_no'] = $unique_id;
            $sports = SportsScheme::create(Arr::only($input, SportsScheme::getFillables()));

            $documentTypeIds = $request->input('document_id');
            if ($request->hasFile("document_file")) {
                $files = $request->file("document_file");
                foreach ($files as $key => $file) {
                    $documentTypeId = $documentTypeIds[$key];
                    $imageName = time() . '_' . $file->getClientOriginalName();
                    $file->move('sports_scheme_file/', $imageName);
                    SportsSchemeDocuments_model::create([
                        "document_file" => $imageName,
                        'document_id' => $documentTypeId,
                        "sports_id" => $sports->id,
                    ]);
                }
            }

            DB::commit();
            return response()->json(['success' => 'Sports Scheme created successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'creating', 'Sports Scheme');
        }
    }

    public function edit(SportsScheme $sports_scheme)
    {
        $sports_scheme->load(['sportsSchemeDocuments.document']);
        if ($sports_scheme) {
            $response = [
                'result' => 1,
                'sports_scheme' => $sports_scheme,
                'documents' => $sports_scheme->sportsSchemeDocuments,
            ];
        } else {
            $response = ['result' => 0];
        }
        return $response;
    }

    public function update(UpdateSportsRequest $request, SportsScheme $sports_scheme)
    {
        try {
            DB::beginTransaction();
            $input = $request->validated();

            if (
                $sports_scheme['hod_status'] == 1 && $sports_scheme['ac_status'] == 1 && $sports_scheme['amc_status'] == 1 && $sports_scheme['dmc_status'] == 2
                || $sports_scheme['hod_status'] == 1 && $sports_scheme['ac_status'] == 1 && $sports_scheme['amc_status'] == 2 && $sports_scheme['dmc_status'] == 1
                || $sports_scheme['hod_status'] == 1 && $sports_scheme['ac_status'] == 2 && $sports_scheme['amc_status'] == 1 && $sports_scheme['dmc_status'] == 1
                || $sports_scheme['hod_status'] == 2 && $sports_scheme['ac_status'] == 1 && $sports_scheme['amc_status'] == 1 && $sports_scheme['dmc_status'] == 1
                || $sports_scheme['hod_status'] == 2 && $sports_scheme['ac_status'] == 2 && $sports_scheme['amc_status'] == 2 && $sports_scheme['dmc_status'] == 2
                || $sports_scheme['hod_status'] == 1 && $sports_scheme['ac_status'] == 1 && $sports_scheme['amc_status'] == 1 && $sports_scheme['dmc_status'] == 2
                || $sports_scheme['hod_status'] == 1 && $sports_scheme['ac_status'] == 2 && $sports_scheme['amc_status'] == 0 && $sports_scheme['dmc_status'] == 0
                || $sports_scheme['hod_status'] == 2 && $sports_scheme['ac_status'] == 0 && $sports_scheme['amc_status'] == 0 && $sports_scheme['dmc_status'] == 0
                || $sports_scheme['hod_status'] == 1 && $sports_scheme['ac_status'] == 1 && $sports_scheme['amc_status'] == 2 && $sports_scheme['dmc_status'] == 0
            ) {
                $sports_scheme['hod_status'] = 0;
                $sports_scheme['ac_status']  = 0;
                $sports_scheme['amc_status'] = 0;
                $sports_scheme['dmc_status'] = 0;
            }

            // udpate documents
            if ($request->hasFile('candidate_signature')) {
                $imagePath = $request->file('candidate_signature')->store('sports_scheme_file/candidate_signature', 'public');
                $input['candidate_signature'] = $imagePath;
            }

            if ($request->hasFile('passport_size_photo')) {
                $imagePath1 = $request->file('passport_size_photo')->store('sports_scheme_file/passport_size_photo', 'public');
                $input['passport_size_photo'] = $imagePath1;
            }

            $sports_scheme->update(Arr::only($input, SportsScheme::getFillables()));
            
            // update uploaded dynamic document
            $documentTypeIds = $request->input('document_id');
            if ($request->hasFile("document_file")) {
                DB::table('trans_sports_scheme_documents')->where('sports_id',$sports_scheme['id'])->delete();
                $files = $request->file("document_file");
                foreach ($files as $key => $file) {
                    $documentTypeId = $documentTypeIds[$key];
                    $imageName = time() . '_' . $file->getClientOriginalName();
                    $file->move('sports_scheme_file/', $imageName);
                    DB::table('trans_sports_scheme_documents')->insert([
                        "document_file" => $imageName,
                        'document_id' => $documentTypeId,
                        "sports_id" => $sports_scheme['id'],
                    ]);
                }
            }

            DB::commit();
            return response()->json(['success' => 'Sports Scheme updated successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'updating', 'Sports Scheme');
        }
    }


    public function destroy(SportsScheme $sports_scheme)
    {
        try {
            DB::beginTransaction();
            $sports_scheme->sportsSchemeDocuments()->delete();
            $sports_scheme->delete();
            DB::commit();
            return response()->json(['success' => 'Sports Scheme deleted successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'deleting', 'Sports Scheme');
        }
    }

    public function generateCertificate($id)
    {

        $data =  DB::table('trans_sports_scheme AS t1')
            ->where('t1.id', '=', $id)
            ->whereNull('t1.deleted_at')
            ->orderBy('t1.id', 'DESC')
            ->first();

        return view('users.sports_scheme.generate_certificate', compact('data'));
    }

    public function sportsSchemeApplicationView($id)
    {

        $data =  DB::table('trans_sports_scheme AS t1')
            ->where('t1.id', '=', $id)
            ->whereNull('t1.deleted_at')
            ->orderBy('t1.id', 'DESC')
            ->first();

        $document = DB::table('trans_sports_scheme_documents AS t1')
            ->select('t1.*', 't2.document_name')
            ->leftJoin('document_type_msts AS t2', 't2.id', '=', 't1.document_id')
            ->whereNull('t1.deleted_at')
            ->where('t1.sports_id', $data->id)
            ->get();

        return view('users.sports_scheme.view', compact('data', 'document'));
    }

    public function sportsSchemeCertificate($id)
    {

        $data =  DB::table('trans_sports_scheme AS t1')
            ->where('t1.id', '=', $id)
            ->whereNull('t1.deleted_at')
            ->orderBy('t1.id', 'DESC')
            ->first();

        $document = DB::table('trans_sports_scheme_documents AS t1')
            ->select('t1.*', 't2.document_name')
            ->leftJoin('document_type_msts AS t2', 't2.id', '=', 't1.document_id')
            ->whereNull('t1.deleted_at')
            ->where('t1.sports_id', $data->id)
            ->get();

        return view('users.sports_scheme.sports_scheme_certificate_view', compact('data', 'document'));
    }
}