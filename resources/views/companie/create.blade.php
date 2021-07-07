@extends('layouts.app')
@section('title')
Add Companie
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">

      @include('layouts.notif')

        <div class="col-md-12 mt-2">
            <div class="card">
                <div class="card-header">
                    Add Companie
                    <a href="{{ route('companies.index') }}" class="btn btn-sm btn-secondary float-right">Back</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                          <div class="col-6">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            @include('layouts.error', ['name' => 'name'])
                          </div>
                          <div class="col-6">
                            <label for="">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                            @include('layouts.error', ['name' => 'email'])
                        </div>
                      </div>
                      <div class="row mt-3">
                            <div class="col-6">
                                <img id="output" src="" width="100" height="100" alt="Logo Preview" class="img-thumbnail">
                                <div class="custom-file mt-3">
                                    <input type="file" name="logo" class="custom-file-input" accept="image/*" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                                    @include('layouts.error', ['name' => 'logo'])
                                    <label for="" class="custom-file-label">Choose Logo..</label>
                                </div>
                            </div>
                            <div class="col-6 ">
                                <label for="">Website</label>
                                <div class="mt-2">
                                    <input type="text" name="website" class="form-control" value="{{ old('website') }}">
                                    @include('layouts.error', ['name' => 'website'])
                                </div>
                            </div>
                      </div>
                      <div class="row p-3">
                            <button class="btn btn-primary btn-block" type="submit">Add Companie</button>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
