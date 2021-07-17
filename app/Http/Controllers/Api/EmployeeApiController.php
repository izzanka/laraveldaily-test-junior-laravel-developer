<?php

namespace App\Http\Controllers\Api;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\EmployeeResource;


class EmployeeApiController extends Controller
{
    public function getEmployees(){
        $employee = Employee::with(['companie' => function($query){
            $query->select(['id','name']);
        }])->select('id','first_name','last_name','email','phone','companie_id')->latest()->get();
        return datatables()->of($employee)
                ->addIndexColumn()
                ->addColumn('action',function($employee){
                    return '<a href="/employees/'. $employee->id .'/edit"
                    class="btn btn-primary btn-sm btn-block">Edit</a>
                    <a href="/employees/' . $employee->id . '/destroy"
                    class="btn btn-danger btn-sm btn-block">Delete</a>';
                })
                ->rawColumns(['action'])
                ->toJson();
    }

    public function index(){
        $employees = Employee::with('companie')->get();
        return EmployeeResource::collection($employees);
    }

    public function show(Employee $employee){
        return new EmployeeResource($employee->load(['companie']));
    }

    
}
