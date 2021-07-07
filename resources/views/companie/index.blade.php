@extends('layouts.app')
@section('title')
Companies
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">

        @include('layouts.notif')

        <div class="col-md-12 mt-2">
            <div class="card">
                <div class="card-header">
                    Companies
                    <a href="{{ route('companies.create') }}" class="btn btn-sm btn-primary float-right">Add Companie</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-center table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Logo</th>
                                    <th>Website</th>
                                    <th>Action</th>
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
                                            <a href="{{ route('companies.edit',$companie->id) }}" class="btn btn-primary btn-sm btn-block">Edit</a>
                                            
                                            <form action="{{ route('companies.destroy',$companie->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm btn-block mt-2" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                <td colspan="5"><strong>No Data</strong></td>
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
