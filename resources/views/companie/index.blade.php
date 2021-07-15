@extends('layouts.app')
@section('title')
{{ __('companie.title1') }}
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">

        @include('layouts.notif')

        <div class="col-md-12 mt-2">
            <div class="card">
                <div class="card-header">
                    {{ __('companie.title1') }}
                    <a href="{{ route('companies.create') }}" class="btn btn-sm btn-primary float-right">{{ __('companie.btn1') }}</a>
                </div>
                <div class="card-body">
                    <table class="table text-center table-bordered table-striped" id="CompaniesTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('companie.table1') }}</th>
                                <th>{{ __('companie.table2') }}</th>
                                <th>{{ __('companie.table3') }}</th>
                                <th>{{ __('companie.table4') }}</th>
                                <th>{{ __('companie.table5') }}</th>
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
        $('#CompaniesTable').DataTable({
            "processing": true,
            "serverSide": true,
            "responsive": true,
            "ajax": "{{ route('api.companies') }}",
            "columns": [
                { "data": "DT_RowIndex", name:'DT_RowIndex'},
                { "data": "name" },
                { "data": "email" },
                { "data": "image", name:'image', orderable: false, searchable: false },
                { "data": "website" },
                { "data": "action", name:'action', orderable: false, searchable: false }
            ]
        });

    } );
</script>
@endsection
