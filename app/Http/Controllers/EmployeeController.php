<?php

namespace App\Http\Controllers;

use App\Models\Companie;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeStoreRequest;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $employees = Employee::latest()->paginate(10);
        // return view('employee.index',compact('employees'));
        return view('employee.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Companie::select('id','name')->latest()->get();
        return view('employee.create',compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeStoreRequest $request)
    {
        Employee::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'companie_id' => $request->companie_id,
            'email' => $request->email,
            'phone' => $request->phone
        ]);

        return redirect()->route('employees.create')->with('message',['text' => __('employee.status2'), 'class' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $companies = Companie::select('id','name')->get();
        return view('employee.edit',compact('employee','companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeStoreRequest $request, Employee $employee)
    {
        $employee->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'companie_id' => $request->companie_id,
            'email' => $request->email,
            'phone' => $request->phone
        ]);

        return redirect()->route('employees.edit',$employee->id)->with('message',['text' => __('employee.status3'), 'class' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('message',['text' => __('employee.status4'), 'class' => 'success']);
    }
}
