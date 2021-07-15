@extends('layouts.app')
@section('title')
{{ __('employee.title1') }}
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">

        @include('layouts.notif')

        <div class="col-md-12 mt-2">
            <div class="card">
                <div class="card-header">
                    {{ __('employee.title1') }}
                    <a href="{{ route('employees.create')}}" class="btn btn-sm btn-primary float-right">{{ __('employee.btn1') }}</a>
                </div>
                <div class="card-body">
                    <table class="table text-center table-bordered table-striped" id="EmployeesTable">
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
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready( function () {
        $.noConflict();
        $('#EmployeesTable').DataTable({
            "processing": true,
            "serverSide": true,
            "responsive": true,
            "ajax": "{{ route('api.employees') }}",
            "columns": [
                { "data": "DT_RowIndex", name:'DT_RowIndex'},
                { "data": "first_name" },
                { "data": "last_name" },
                { "data": "companie.name" },
                { "data": "email" },
                { "data": "phone" },
                { "data": "action", name:'action', orderable: false, searchable: false }
            ]
        });

    } );
</script>
@endsection

