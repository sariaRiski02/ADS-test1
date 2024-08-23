<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Resources\EmployeeResource;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function firstJoined()
    {
        $employees = Employee::orderBy('tanggal_bergabung', 'asc')->take(3)->get();
        return EmployeeResource::collection($employees);
    }


    public function index()
    {
        $employees = Employee::all();
        return EmployeeResource::collection($employees);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        $data = $request->validated();
        $employee = Employee::create($data);
        return new EmployeeResource($employee);
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return new EmployeeResource($employee);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $data = $request->validated();
        $employee->update($data);
        return new EmployeeResource($employee);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return response()->json(['message' => 'Employee deleted successfully']);
    }

    /**
     * Search employee by name
     */
    public function search($nama)
    {
        $employees = Employee::where('nama', 'like', "%$nama%")->get();
        return EmployeeResource::collection($employees);
    }
}
