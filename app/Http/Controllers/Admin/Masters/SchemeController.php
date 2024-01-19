<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Admin\Controller;
use Illuminate\Http\Request;
use App\Models\SchemeMst;
use App\Models\CategoryMst;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Admin\Masters\StoreSchemeRequest;
use App\Http\Requests\Admin\Masters\UpdateSchemeRequest;

class SchemeController extends Controller
{

    public function index()
    {
        $scheme = SchemeMst::latest()->get();
        $category = CategoryMst::latest()->get();

        return view('admin.masters.scheme')->with(['scheme'=> $scheme, 'category'=>$category]);
    }


    public function store(StoreSchemeRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();

             SchemeMst::create(Arr::only($input, SchemeMst::getFillables()));

            DB::commit();

            return response()->json(['success'=> 'Scheme created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Scheme');
        }
    }


    public function edit(SchemeMst $scheme)
    {
        $category = CategoryMst::latest()->get();
        $scheme->load('category')->first();
        if ($scheme)
        {
            $categoryHtml = '<span>
            <option value="">--Select Category--</option>';
            foreach($category as $cat):
                $is_select = $cat->id == $scheme->cat_id ? "selected" : "";
                $categoryHtml .= '<option value="'.$cat->id.'" '.$is_select.'>'.$cat->category_name.'</option>';
            endforeach;
            $categoryHtml .= '</span>';


            $response = [
                'result' => 1,
                'scheme' => $scheme,
                'categoryHtml'=>$categoryHtml
            ];
        }
        else
        {
            $response = ['result' => 0];
        }
        return $response;
    }


    public function update(UpdateSchemeRequest $request, SchemeMst $scheme)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $input['cat_id'] = $input['cat_id'];
            $scheme->update( Arr::only( $input, SchemeMst::getFillables() ) );
            DB::commit();

            return response()->json(['success'=> 'Scheme updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'Scheme');
        }
    }


    public function destroy(SchemeMst $scheme)
    {
        try
        {
            DB::beginTransaction();
            $scheme->delete();
            DB::commit();

            return response()->json(['success'=> 'Scheme deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'Scheme');
        }
    }

}
