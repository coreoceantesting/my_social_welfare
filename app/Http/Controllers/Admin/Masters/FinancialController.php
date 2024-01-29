<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Admin\Controller;
use Illuminate\Http\Request;
use App\Models\FinancialMst;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Admin\Masters\StoreFinancialRequest;
use App\Http\Requests\Admin\Masters\UpdateFinancialRequest;

class FinancialController extends Controller
{

    public function index()
    {
        $financial = FinancialMst::latest()->get();
        return view('admin.masters.financial')->with(['financial'=> $financial]);
    }


    public function store(StoreFinancialRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $isActive = $request->has('is_active') ? 1 : 0;

            if ($isActive) {
                FinancialMst::where('is_active', 1)->update(['is_active' => 0]);
            }

            $input['is_active'] = $isActive;
            FinancialMst::create(Arr::only($input, FinancialMst::getFillables()));
            DB::commit();
            return response()->json(['success'=> 'Scheme created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Scheme');
        }

    }

    public function edit(FinancialMst $financial)
    {
        if ($financial)
        {
            $response = [
                'result' => 1,
                'financial' => $financial,
            ];
        }
        else
        {
            $response = ['result' => 0];
        }
        return $response;
    }


    public function update(UpdateFinancialRequest $request, FinancialMst $financial)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $financial->update( Arr::only( $input, FinancialMst::getFillables() ) );
            DB::commit();
            return response()->json(['success'=> 'Financial Year updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'Financial Year');
        }
    }


    public function destroy(FinancialMst $financial)
    {
        try
        {
            DB::beginTransaction();
            $financial->delete();
            DB::commit();
            return response()->json(['success'=> 'Financial Year deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'Financial Year');
        }
    }
}