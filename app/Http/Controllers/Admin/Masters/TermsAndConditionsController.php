<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Admin\Controller;
use Illuminate\Http\Request;
use App\Models\SchemeMst;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use App\Models\TermsAndConditionsMst;
use App\Http\Requests\Admin\Masters\StoreConditionsRequest;
use App\Http\Requests\Admin\Masters\UpdateConditionsRequest;



class TermsAndConditionsController extends Controller
{
    public function index()
    {
        $terms =TermsAndConditionsMst::latest()->get();
        $scheme = SchemeMst::latest()->get();
        return view('admin.masters.terms_conditons')->with(['scheme'=> $scheme, 'terms'=>$terms]);
    }

    public function store(StoreConditionsRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            TermsAndConditionsMst::create(Arr::only($input, TermsAndConditionsMst::getFillables()));
            DB::commit();
            return response()->json(['success'=> 'Terms And Conditions created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Terms And Conditions');
        }
    }

    public function edit(TermsAndConditionsMst $terms_condition)
    {
        $scheme = SchemeMst::latest()->get();
        $terms_condition->load('scheme')->first();
        if ($terms_condition)
        {
            $schemeHtml = '<span>
            <option value="">--Select Scheme--</option>';
            foreach($scheme as $schemes):
                $is_select = $schemes->id == $terms_condition->scheme_id ? "selected" : "";
                $schemeHtml .= '<option value="'.$schemes->id.'" '.$is_select.'>'.$schemes->scheme_name.'</option>';
            endforeach;
            $schemeHtml .= '</span>';


            $response = [
                'result' => 1,
                'terms' => $terms_condition,
                'schemeHtml'=>$schemeHtml
            ];
        }
        else
        {
            $response = ['result' => 0];
        }
        return $response;
    }

    public function update(UpdateConditionsRequest $request, TermsAndConditionsMst $terms_condition)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $input['scheme_id'] = $input['scheme_id'];
            $terms_condition->update( Arr::only( $input, TermsAndConditionsMst::getFillables() ) );
            DB::commit();
            return response()->json(['success'=> 'Terms And Conditions updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'Terms And Conditions');
        }
    }



    public function destroy(TermsAndConditionsMst $terms_condition)
{
    try
        {
            DB::beginTransaction();
            $terms_condition->delete();
            DB::commit();
            return response()->json(['success'=> 'Terms And Conditions deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'Terms And Conditions');
        }
    }




}