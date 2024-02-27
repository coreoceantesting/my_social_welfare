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
        $schemes = SchemeMst::latest()->get();
        return view('admin.masters.scheme')->with(['schemes' => $schemes]);
    }


    public function store(StoreSchemeRequest $request)
    {
        try {
            DB::beginTransaction();
            $input = $request->validated();
            SchemeMst::create(Arr::only($input, SchemeMst::getFillables()));
            DB::commit();
            return response()->json(['success' => 'Scheme created successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'creating', 'Scheme');
        }
    }


    public function edit(SchemeMst $scheme)
    {
        if ($scheme) {
            $response = [
                'result' => 1,
                'schemes' => $scheme,
            ];
        } else {
            $response = ['result' => 0];
        }
        return $response;
    }



    public function update(UpdateSchemeRequest $request, SchemeMst $scheme)
    {
        try {
            DB::beginTransaction();
            $input = $request->validated();
            $scheme->update(Arr::only($input, SchemeMst::getFillables()));
            DB::commit();
            return response()->json(['success' => 'Scheme updated successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'updating', 'Scheme');
        }
    }


    public function destroy(SchemeMst $scheme)
    {
        try {
            DB::beginTransaction();
            $scheme->delete();
            DB::commit();
            return response()->json(['success' => 'Scheme deleted successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'deleting', 'Scheme');
        }
    }
}