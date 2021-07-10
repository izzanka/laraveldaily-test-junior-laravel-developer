@extends('layouts.app')
@section('title')
{{ __('companie.title') }}
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">

        @include('layouts.notif')

        <div class="col-md-12 mt-2">
            <div class="card">
                <div class="card-header">
                    {{ __('companie.title') }}
                    <a href="{{ route('companies.create') }}" class="btn btn-sm btn-primary float-right">{{ __('companie.btn1') }}</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-center table-bordered table-striped">
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
                                @forelse ($companies as $companie)
                                    <tr>
                                        <td>{{ ($companies->currentPage() - 1) * $companies->perPage() + $loop->iteration }}</td>
                                        <td>{{ $companie->name }}</td>
                                        <td>{{ $companie->email }}</td>
                                        <td>
                                            <img src="{{ Storage::url('logos/' . $companie->logo) }}" alt="" width="100" height="100">
                                        </td>
                                        <td><a href="https://{{ $companie->website }}" target="_blank">{{ $companie->website }}</a></td>
                                        <td>
                                            <a href="{{ route('companies.edit',$companie->id) }}" class="btn btn-primary btn-sm btn-block">{{ __('companie.btn2') }}</a>
                                            
                                            <form action="{{ route('companies.destroy',$companie->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm btn-block mt-2" onclick="return confirm('{{ __('companie.alert') }}')">{{ __('companie.btn3') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                <td colspan="6"><strong>{{ __('companie.status') }}</strong></td>
                                @endforelse
                            </tbody>

                        </table>
                    </div>

                    <div class="row">
                        <div class="col">
                            {{ $companies->links() }}
                        </div>
                    </div>

                </div>
            </div>
        </div>

       

    </div>
</div>
@endsection
