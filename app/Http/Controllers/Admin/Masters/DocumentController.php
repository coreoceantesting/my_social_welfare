<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Admin\Controller;
use Illuminate\Http\Request;
use App\Models\DocumentMst;
use App\Models\SchemeMst;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Admin\Masters\StoreDocumentRequest;
use App\Http\Requests\Admin\Masters\UpdateDocumentRequest;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documents = DocumentMst::with('scheme')
                    ->join('scheme_mst', 'document_type_msts.scheme_id', '=', 'scheme_mst.id')
                    ->orderBy('scheme_mst.scheme_name', 'asc')
                    ->get();

        $scheme = SchemeMst::latest()->get();
        return view('admin.masters.document')->with(['scheme'=> $scheme, 'documents'=>$documents]);
    }


    public function store(StoreDocumentRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            DocumentMst::create(Arr::only($input, DocumentMst::getFillables()));
            DB::commit();
            return response()->json(['success'=> 'Document created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Document');
        }
    }


    public function edit(DocumentMst $document)
    {
        $scheme = SchemeMst::latest()->get();
        $document->load('scheme')->first();
        if ($document)
        {
            $schemeHtml = '<span>
            <option value="">--Select Scheme--</option>';
            foreach($scheme as $schemes):
                $is_select = $schemes->id == $document->scheme_id ? "selected" : "";
                $schemeHtml .= '<option value="'.$schemes->id.'" '.$is_select.'>'.$schemes->scheme_name.'</option>';
            endforeach;
            $schemeHtml .= '</span>';


            $response = [
                'result' => 1,
                'document' => $document,
                'schemeHtml'=>$schemeHtml
            ];
        }
        else
        {
            $response = ['result' => 0];
        }
        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDocumentRequest $request, DocumentMst $document)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $input['scheme_id'] = $input['scheme_id'];
            $document->update( Arr::only( $input, DocumentMst::getFillables() ) );
            DB::commit();
            return response()->json(['success'=> 'Document updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'Document');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DocumentMst $document)
    {
        try
        {
            DB::beginTransaction();
            $document->delete();
            DB::commit();
            return response()->json(['success'=> 'Document deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'Document');
        }
    }
}
