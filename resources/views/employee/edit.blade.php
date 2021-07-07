@extends('layouts.app')
@section('title')
Edit Employee
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">

        @include('layouts.notif')
        
        <div class="col-md-12 mt-2">
            <div class="card">
                <div class="card-header">
                    Edit Employee
                    <a href="{{ route('employees.index') }}" class="btn btn-sm btn-secondary float-right">Back</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('employees.update',$employee->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-6">
                                <label for="">First Name</label>
                                <input type="text" class="form-control" name="first_name" value="{{ $employee->first_name }}">
                                @include('layouts.error', ['name' => 'first_name'])
                            </div>
                            <div class="col-6">
                                <label for="">Last Name</label>
                                <input type="text" class="form-control" name="last_name" value="{{ $employee->last_name }}">
                                @include('layouts.error', ['name' => 'last_name'])
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label for="">Companie Name</label>
                                <select name="companie_id" class="form-control">
                                    <option value="" disabled>Select Companie</option>
                                    @forelse ($companies as $companie)
                                        @php
                                            if($companie->id == $employee->companie_id){
                                                $select = "selected";
                                            }else{
                                                $select = "";
                                            }
                                            echo "<option $select value='$companie->id'>".$companie['name']."</option>"
                                        @endphp
                                    @empty
                                        <option value="" selected>No Data</option>
                                    @endforelse
                                </select>
                                @include('layouts.error', ['name' => 'companie_id'])
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-6">
                                <label for="">Email</label>
                                <input type="email" class="form-control" name="email" value="{{ $employee->email }}">
                                @include('layouts.error', ['name' => 'email'])
                            </div>
                            <div class="col-6">
                                <label for="">Phone</label>
                                <input type="text" class="form-control" name="phone" value="{{ $employee->phone }}">
                                @include('layouts.error', ['name' => 'phone'])
                            </div>
                        </div>
                        <div class="row p-3">
                            <button class="btn btn-primary btn-block" type="submit">Add Employee</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
