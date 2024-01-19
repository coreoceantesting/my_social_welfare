<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Masters\StoreCategoryRequest;
use App\Http\Requests\Admin\Masters\UpdateCategoryRequest;
use Illuminate\Http\Request;
use App\Models\CategoryMst;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

    public function index()
    {
        $category = CategoryMst::latest()->get();

        return view('admin.masters.category')->with(['category'=> $category]);
    }


    public function store(StoreCategoryRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            CategoryMst::create( Arr::only( $input, CategoryMst::getFillables() ) );
            DB::commit();

            return response()->json(['success'=> 'Category created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Category');
        }
    }


    public function edit(CategoryMst $category)
    {
        if ($category)
        {
            $response = [
                'result' => 1,
                'category' => $category,
            ];
        }
        else
        {
            $response = ['result' => 0];
        }
        return $response;

    }


    public function update(UpdateCategoryRequest $request, CategoryMst $category)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $category->update( Arr::only( $input, CategoryMst::getFillables() ) );
            DB::commit();

            return response()->json(['success'=> 'Category updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'Category');
        }
    }


    public function destroy(CategoryMst $category)
    {
        try
        {
            DB::beginTransaction();
            $category->delete();
            DB::commit();

            return response()->json(['success'=> 'Category deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'Category');
        }
    }




}
