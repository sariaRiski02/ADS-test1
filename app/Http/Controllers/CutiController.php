<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Resources\CutiResource;
use App\Http\Requests\StoreCutiRequest;
use App\Http\Requests\UpdateCutiRequest;

class CutiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $cuti = Cuti::all();
        return CutiResource::collection($cuti);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCutiRequest $request)
    {

        $data = $request->validated();
        $cuti = Cuti::create($data);
        return new CutiResource($cuti);
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        $cuti = $employee->cuti;
        return CutiResource::collection($cuti);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCutiRequest $request, Cuti $cuti)
    {
        $data = $request->validated();
        $result = $cuti->update($data);
        return new CutiResource($result);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cuti = Cuti::findOrFail($id);
        $cuti->delete();
        return response()->json(['message' => 'Cuti deleted successfully'], 200);
    }
}
