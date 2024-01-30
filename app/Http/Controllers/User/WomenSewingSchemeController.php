<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\User\StoreWomenRequest;
use App\Http\Requests\User\UpdateWomenRequest;
use App\Models\WomenScheme;
use App\Models\WomenSchemeDocuments_model;
use App\Models\Ward;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class WomenSewingSchemeController extends Controller
{
    public function index(){
        $women = WomenScheme::where('created_by', Auth::user()->id)->latest()->get();
        $wards = Ward::latest()->get();

        $document = DB::table('document_type_msts')
                        ->where('scheme_id', 6)
                        ->whereNull('deleted_at')
                        ->orderBy('created_at', 'DESC')
                        ->get();
        return view('users.women_scheme')->with(['women'=>$women,'wards' => $wards,'document'=>$document]);
    }

    public function store(StoreWomenRequest $request){
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $unique_id = "WOM-SCH".rand(100000,10000000);
            $input['application_no'] = $unique_id;
            $women = WomenScheme::create( Arr::only( $input, WomenScheme::getFillables() ) );

            $documentTypeIds = $request->input('document_id');
            if ($request->hasFile("document_file")) {
                $files = $request->file("document_file");
                foreach ($files as $key => $file) {
                    $documentTypeId = $documentTypeIds[$key];
                    $imageName = time() . '_' . $file->getClientOriginalName();
                    $file->move('women_scheme_file/', $imageName);
                    WomenSchemeDocuments_model::create([
                        "document_file" => $imageName,
                        'document_id' => $documentTypeId,
                        "women_id" => $women->id,
                    ]);
                }
            }

            DB::commit();
            return response()->json(['success'=> 'Women Scheme created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Women Scheme');
        }
    }

    public function edit(WomenScheme $women_scheme){

        $wards = Ward::latest()->get();
        $women_scheme->load('wardss')->first();

        if ($women_scheme)
        {

            $wardHtml = '<span>
            <option value="">--Select Scheme--</option>';
            foreach($wards as $ward):
                $is_select = $ward->id == $women_scheme->ward_id ? "selected" : "";
                $wardHtml .= '<option value="'.$ward->id.'" '.$is_select.'>'.$ward->name.'</option>';
            endforeach;
            $wardHtml .= '</span>';

            $response = [
                'result' => 1,
                'women_scheme' => $women_scheme,
                'wardHtml'=>$wardHtml,
            ];
        }
        else
        {
            $response = ['result' => 0];
        }
        return $response;
    }

    public function update(UpdateWomenRequest $request, WomenScheme $women_scheme)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $women_scheme->update( Arr::only( $input, WomenScheme::getFillables() ) );
            DB::commit();
            return response()->json(['success'=> 'Women Scheme updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'Women Scheme');
        }
    }

    public function destroy(WomenScheme $women_scheme)
    {
        try
        {
            DB::beginTransaction();
            $women_scheme->delete();
            DB::commit();
            return response()->json(['success'=> 'Women Scheme deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'Women Scheme');
        }
    }
}