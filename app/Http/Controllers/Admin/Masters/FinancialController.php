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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $financial = FinancialMst::latest()->get();
        return view('admin.masters.financial')->with(['financial'=> $financial]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFinancialRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();

             // Check if the new financial year should be active
           $isActive = $request->has('is_active') ? 1 : 0;

            // If the new financial year is set to be active,
            // deactivate the previous active financial year
            if ($isActive) {
                FinancialMst::where('is_active', 1)->update(['is_active' => 0]);
            }

            // Set the is_active value for the new financial year
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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
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

    /**
     * Update the specified resource in storage.
     */
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

    /**
     * Remove the specified resource from storage.
     */
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