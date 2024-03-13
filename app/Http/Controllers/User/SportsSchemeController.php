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

            if ($request->input('financial_help') == 'relational') {

                // Validate the input data
                $request->validate([
                    'player_name.*' => 'required',
                    'player_mobile_no.*' => 'required|max:10',
                    'player_aadhar_no.*' => 'required|max:12',
                    'player_signature.*' => 'required|file|mimes:png,jpg,jpeg',
                    'player_photo.*' => 'required|file|mimes:png,jpg,jpeg',
                    'player_aadhar_photo.*' => 'required|file|mimes:png,jpg,jpeg',
                ]);

                // Store player details
                $playerDetails = [];
                $playerNames = $request->input('player_name');
                $playerMobileNos = $request->input('player_mobile_no');
                $playerAadharNos = $request->input('player_aadhar_no');
                $playerSignatures = $request->file('player_signature');
                $playerPhotos = $request->file('player_photo');
                $playerAadharPhotos = $request->file('player_aadhar_photo');
                
                foreach ($playerNames as $key => $playerName) {
                    $playerDetails[] = [
                        'sport_scheme_id' => $sports->id,
                        'player_name' => $playerName,
                        'player_mobile_no' => $playerMobileNos[$key],
                        'player_aadhar_no' => $playerAadharNos[$key],
                        'player_signature' => $playerSignatures[$key]->store('player_details/player_signature', 'public'),
                        'player_photo' => $playerPhotos[$key]->store('player_details/player_photo', 'public'),
                        'player_aadhar_photo' => $playerAadharPhotos[$key]->store('player_details/aadhar_photo', 'public'),
                        'created_by' => Auth::user()->id,
                        'created_at' => date('Y-m-d H:i:s'),
                    ];
                }
                
                // Store player details in the database
                DB::table('sport_scheme_player_details')->insert($playerDetails);
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
        $player_details = DB::table('sport_scheme_player_details')
        ->select('player_id', 'player_name', 'player_mobile_no', 'player_aadhar_no', 'player_signature', 'player_photo', 'player_aadhar_photo')
        ->where('sport_scheme_id', $sports_scheme->id)
        ->get();

        $player_details_html = ''; 
        if (!empty($player_details)) {
            foreach ($player_details as $player) {
                // $player_details_html .=  '<div class="add-players-details mt-5">';

                $player_details_html .=  '<div class="row">';
                $player_details_html .=  '<input type="hidden" class="form-control" name="player_id[]" id="player_id" value="' . $player->player_id . '" required>';
                $player_details_html .=  '<div class="col-md-4 mt-3">';
                $player_details_html .=  '<label for="player_name">Player Name / खेळाडूचे नाव: <span class="text-danger">*</span></label>';
                $player_details_html .=  '<input type="text" class="form-control" name="player_name[]" id="player_name" placeholder="Enter Player Name" value="' . $player->player_name . '" required>';
                $player_details_html .=  '</div>';

                $player_details_html .=  '<div class="col-md-4 mt-3">';
                $player_details_html .=  '<label for="player_mobile_no">Player Contact No / संपर्क क्र : <span class="text-danger">*</span></label>';
                $player_details_html .=  '<input type="number" class="form-control" name="player_mobile_no[]" id="player_mobile_no" value="' . $player->player_mobile_no . '" placeholder="Enter Player Contact No" required>';
                $player_details_html .=  '</div>';

                $player_details_html .=  '<div class="col-md-4 mt-3">';
                $player_details_html .=  '<label for="player_name">Player Aadhar No / आधार क्र: <span class="text-danger">*</span></label>';
                $player_details_html .=  '<input type="text" class="form-control" name="player_aadhar_no[]" id="player_aadhar_no" value="' . $player->player_aadhar_no . '" placeholder="Enter Player Aadhar No" required>';
                $player_details_html .=  '</div>';

                $player_details_html .=  '<div class="col-md-4 mt-3">';
                $player_details_html .=  '<label for="player_name">Player Signature /स्वाक्षरी: <span class="text-danger">*</span></label>';
                $player_details_html .=  '<input class="form-control" id="player_signature" name="player_signature[]" type="file" accept=".png, .jpg, .jpeg">';
                $player_details_html .= '<small><a href="storage/' . $player->player_signature . '" target="_blank">View Document</a></small>';
                $player_details_html .=  '</div>';

                $player_details_html .=  '<div class="col-md-4 mt-3">';
                $player_details_html .=  '<label for="player_name">Player Photo / प्लेअर फोटो: <span class="text-danger">*</span></label>';
                $player_details_html .=  '<input class="form-control" id="player_photo" name="player_photo[]" type="file" accept=".png, .jpg, .jpeg">';
                $player_details_html .= '<small><a href="storage/' . $player->player_photo . '" target="_blank">View Document</a></small>';
                $player_details_html .=  '</div>';

                $player_details_html .=  '<div class="col-md-4 mt-3">';
                $player_details_html .=  '<label for="player_name">Player Aadhar Card / आधार कार्ड: <span class="text-danger">*</span></label>';
                $player_details_html .=  '<input class="form-control" id="player_aadhar_photo" name="player_aadhar_photo[]" type="file" accept=".png, .jpg, .jpeg">';
                $player_details_html .= '<small><a href="storage/' . $player->player_aadhar_photo . '" target="_blank">View Document</a></small>';
                $player_details_html .=  '</div>';

                $player_details_html .=  '<hr class="mt-3"></div>';

            }
        }

        if ($sports_scheme) {
            $response = [
                'result' => 1,
                'sports_scheme' => $sports_scheme,
                'documents' => $sports_scheme->sportsSchemeDocuments,
                'player_details_html' => $player_details_html
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
                        "updated_by" => Auth::user()->id,
                        "updated_at" => date('Y-m-d H:i:s'),
                    ]);
                }
            }

            // update players details
            if ($request->input('financial_help') == 'relational') {

                // Validate the input data
                $request->validate([
                    'player_name.*' => 'required',
                    'player_mobile_no.*' => 'required|max:10',
                    'player_aadhar_no.*' => 'required|max:12',
                    'player_signature.*' => 'nullable|file|mimes:png,jpg,jpeg',
                    'player_photo.*' => 'nullable|file|mimes:png,jpg,jpeg',
                    'player_aadhar_photo.*' => 'nullable|file|mimes:png,jpg,jpeg',
                ]);
            
                // Update player details
                $playerDetails = [];
                $playerIds = $request->input('player_id');
                $playerNames = $request->input('player_name');
                $playerMobileNos = $request->input('player_mobile_no');
                $playerAadharNos = $request->input('player_aadhar_no');
                $playerSignatures = $request->file('player_signature');
                $playerPhotos = $request->file('player_photo');
                $playerAadharPhotos = $request->file('player_aadhar_photo');
            
                // Iterate over the updated player details
                foreach ($playerNames as $key => $playerName) {
                    $playerDetails[] = [
                        'player_id' => $playerIds[$key],
                        'sport_scheme_id' => $sports_scheme['id'],
                        'player_name' => $playerName,
                        'player_mobile_no' => $playerMobileNos[$key],
                        'player_aadhar_no' => $playerAadharNos[$key],
                        'updated_by' => Auth::user()->id,
                        'updated_at' => now(), // Use Carbon instance for current timestamp
                    ];
            
                    // Check if signature, photo, and Aadhar photo are provided for update
                    if (isset($playerSignatures[$key])) {
                        $playerDetails[$key]['player_signature'] = $playerSignatures[$key]->store('player_details/player_signature', 'public');
                    }
                    if (isset($playerPhotos[$key])) {
                        $playerDetails[$key]['player_photo'] = $playerPhotos[$key]->store('player_details/player_photo', 'public');
                    }
                    if (isset($playerAadharPhotos[$key])) {
                        $playerDetails[$key]['player_aadhar_photo'] = $playerAadharPhotos[$key]->store('player_details/aadhar_photo', 'public');
                    }
                }
            
                // Insert new player details into the database
                foreach ($playerDetails as $detail) {
                    if ($detail['player_id'] == '') {
                        // Insert new player details
                        DB::table('sport_scheme_player_details')->insert($detail);
                    } else {
                        // Update existing player details in the database
                        DB::table('sport_scheme_player_details')
                            ->where('sport_scheme_id', $sports_scheme['id'])
                            ->where('player_id', $detail['player_id'])
                            ->update($detail);
                    }
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
            DB::table('sport_scheme_player_details')->where('sport_scheme_id', $sports_scheme->id)->delete();
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
        $player_details = DB::table('sport_scheme_player_details')
        ->where('sport_scheme_id',$id)
        ->get();

        return view('users.sports_scheme.sports_scheme_certificate_view', compact('data', 'document','player_details'));
    }
}