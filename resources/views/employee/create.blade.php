@extends('layouts.app')
@section('title')
{{ __('employee.title2') }}
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">

        @include('layouts.notif')
        
        <div class="col-md-12 mt-2">
            <div class="card">
                <div class="card-header">
                    {{ __('employee.title2') }}
                    <a href="{{ route('employees.index') }}" class="btn btn-sm btn-secondary float-right">{{ __('employee.btn4') }}</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('employees.store')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <label for="">{{ __('employee.table1') }}</label>
                                <input type="text" class="form-control" name="first_name" value="{{ old('first_name')}}">
                                @include('layouts.error', ['name' => 'first_name'])
                            </div>
                            <div class="col-6">
                                <label for="">{{ __('employee.table2') }}</label>
                                <input type="text" class="form-control" name="last_name" value="{{ old('last_name')}}">
                                @include('layouts.error', ['name' => 'last_name'])
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label for="">{{ __('employee.table3') }}</label>
                                <select name="companie_id" class="form-control">
                                    <option value="" selected disabled>Select Companie</option>
                                    @forelse ($companies as $companie)
                                        <option value="{{ $companie->id }}">{{ $companie->name }}</option>
                                    @empty
                                        <option value="" selected>{{ __('employee.status1') }}</option>
                                    @endforelse
                                </select>
                                @include('layouts.error', ['name' => 'companie_id'])
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-6">
                                <label for="">{{ __('employee.table4') }}</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email')}}">
                                @include('layouts.error', ['name' => 'email'])
                            </div>
                            <div class="col-6">
                                <label for="">{{ __('employee.table5') }}</label>
                                <input type="text" class="form-control" name="phone" value="{{ old('phone')}}">
                                @include('layouts.error', ['name' => 'phone'])
                            </div>
                        </div>
                        <div class="row p-3">
                            <button class="btn btn-primary btn-block" type="submit">{{ __('employee.btn1') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
