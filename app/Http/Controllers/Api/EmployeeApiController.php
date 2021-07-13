<?php

namespace App\Http\Controllers\Api;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmployeeApiController extends Controller
{
    public function getEmployees(){
        $employee = Employee::with('companie')->get();
        return datatables()->of($employee)
                ->addColumn('action',function($employee){
                    return '<a href="/employees/'. $employee->id .'/edit"
                    class="btn btn-primary btn-sm btn-block">Edit</a>
                    <a href="/employees/' . $employee->id . '/destroy"
                    class="btn btn-danger btn-sm btn-block">Delete</a>';
                })
                ->addIndexColumn()
                ->rawColumns(['action'])
                ->make(true);
    }
}
