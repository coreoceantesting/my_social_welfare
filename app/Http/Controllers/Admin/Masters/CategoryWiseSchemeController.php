<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryWiseScheme;
use App\Models\CategoryMst;
use App\Models\SchemeMst;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Admin\Masters\StoreCategoryWiseSchemeRequest;
use App\Http\Requests\Admin\Masters\UpdateCategoryWiseSchemeRequest;


class CategoryWiseSchemeController extends Controller
{
    public function index()
    {

        $categorywisescheme = CategoryWiseScheme::latest()->get();
        $data = SchemeMst::latest()->get();
        $category = CategoryMst::latest()->get();
        return view('admin.masters.category_wise_scheme')->with(['data' => $data, 'categorywisescheme' => $categorywisescheme, 'category' => $category]);
    }

    public function store(StoreCategoryWiseSchemeRequest $request)
    {
        try {
            DB::beginTransaction();
            $input = $request->validated();
            $input['category_id'] = implode(',', $input['category_id']);
            CategoryWiseScheme::create(Arr::only($input, CategoryWiseScheme::getFillables()));

            DB::commit();
            return response()->json(['success' => 'Category Wise Scheme created successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'creating', 'Category Wise Scheme');
        }
    }


    public function edit(CategoryWiseScheme $category_wise_scheme)
    {
        $category = CategoryMst::latest()->get();
        $data = SchemeMst::latest()->get();
        $category_wise_scheme->load('schemes')->first();
        // Use the accessor directly to get categories
        $schemeCategories = $category_wise_scheme->categories;
        if ($category_wise_scheme) {


            $schemeHtml = '<span>
            <option value="">--Select Scheme Name--</option>';
            foreach ($data as $value) :
                $is_select = $value->id == $category_wise_scheme->scheme_id ? "selected" : "";
                $schemeHtml .= '<option value="' . $value->id . '" ' . $is_select . '>' . $value->scheme_name . '</option>';
            endforeach;
            $schemeHtml .= '</span>';

            $categoryHtml = '<span>';
            foreach ($category as $cat) {
                $is_select = $schemeCategories->contains('id', $cat->id) ? "selected" : "";
                $categoryHtml .= '<option value="' . $cat->id . '" ' . $is_select . '>' . $cat->category_name . '</option>';
            }
            $categoryHtml .= '</span>';

            $response = [
                'result' => 1,
                'category_wise_scheme' => $category_wise_scheme,
                'categoryHtml' => $categoryHtml,
                'schemeHtml' => $schemeHtml,
            ];
        } else {
            $response = ['result' => 0];
        }

        return $response;
    }


    public function update(UpdateCategoryWiseSchemeRequest $request, CategoryWiseScheme $category_wise_scheme)
    {
        try {
            DB::beginTransaction();
            $input = $request->validated();
            $input['category_id'] = implode(',', $input['category_id']);
            $category_wise_scheme->update(Arr::only($input, CategoryWiseScheme::getFillables()));
            DB::commit();
            return response()->json(['success' => 'Category Wise Scheme updated successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'updating', 'Category Wise Scheme');
        }
    }



    public function destroy(CategoryWiseScheme $category_wise_scheme)
    {
        try {
            DB::beginTransaction();
            $category_wise_scheme->delete();
            DB::commit();
            return response()->json(['success' => 'Category Wise Scheme deleted successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'deleting', 'Category Wise Scheme');
        }
    }
}