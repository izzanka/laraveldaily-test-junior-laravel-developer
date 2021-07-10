@extends('layouts.app')
@section('title')
{{ __('employee.title') }}
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">

        @include('layouts.notif')

        <div class="col-md-12 mt-2">
            <div class="card">
                <div class="card-header">
                    {{ __('employee.title') }}
                    <a href="{{ route('employees.create')}}" class="btn btn-sm btn-primary float-right">{{ __('employee.btn1') }}</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-center table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('employee.table1') }}</th>
                                    <th>{{ __('employee.table2') }}</th>
                                    <th>{{ __('employee.table3') }}</th>
                                    <th>{{ __('employee.table4') }}</th>
                                    <th>{{ __('employee.table5') }}</th>
                                    <th>{{ __('employee.table6') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($employees as $employee)
                                    <tr>
                                        <td>{{ ($employees->currentPage() - 1) * $employees->perPage() + $loop->iteration }}</td>
                                        <td>{{ $employee->first_name }}</td>
                                        <td>{{ $employee->last_name }}</td>
                                        <td><a href="">{{ $employee->companie->name }}</a></td>
                                        <td>{{ $employee->email }}</td>
                                        <td>{{ $employee->phone }}</td>
                                        <td>
                                            <a href="{{ route('employees.edit',$employee->id) }}" class="btn btn-primary btn-sm btn-block">{{ __('employee.btn2') }}</a>
                                            
                                            <form action="{{ route('employees.destroy',$employee->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm btn-block mt-2" onclick="return confirm('{{ __('employee.alert') }}')">{{ __('employee.btn3') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                <td colspan="7"><strong>{{ __('employee.status') }}</strong></td>
                                @endforelse
                            </tbody>

                        </table>
                    </div>

                    <div class="row">
                        <div class="col">
                            {{ $employees->links() }}
                        </div>
                    </div>

                </div>
            </div>
        </div>

 

    </div>
</div>
@endsection
