@extends('admin.layouts.layout')
@section('content')
    <div class="row">

        <h4 class="card-title col-md-8">Add Subscription</h4>
        <nav aria-label="breadcrumb" class="col-md-4 float-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                <li class="breadcrumb-item "><a href="{{ route('subscriptions.index') }}">Subscriptions</a></li>
                <li class="breadcrumb-item "><a href="">Add Subscription</a></li>
            </ol>
        </nav>
    </div>
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card card-body">

                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <form class="col-md-12" action="{{ route('subscriptions.store') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="exampleInputEmail111">Name</label>
                                    <input type="text" value=""
                                        class="form-control  @error('name')
                                        is-invalid
                                    @enderror"
                                        id="exampleInputEmail111" name="name" placeholder="Enter Package  name" autofocus
                                        autocomplete="">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                            </div>
                            <div class="row">

                                <div class="form-group col-md-6">
                                    <label>User</label>
                                    <select class="js-example-basic-single w-100 from-control @error('user_id') is-invalid @enderror" name="user_id">
                                    {{-- @foreach ($users as $user )
                                    <option value="{{$user->id}}">{{$user->name}}</option>

                                    @endforeach --}}
                                    </select>
                                    @error('user_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail111">Domain</label>
                                    <input type="text" value=""
                                        class="form-control  @error('domain')
                                        is-invalid
                                    @enderror"
                                        id="exampleInputEmail111" name="domain" placeholder="Enter domain name">
                                    @error('domain')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Logo</label>
                                    <input type="file" name="logo" class="file-upload-default">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled=""
                                            placeholder="Upload Image">
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-primary" type="button"
                                                style="height: 50px;">Upload</button>
                                        </span>
                                    </div>
                                    @error('logo')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                            </div>
                            <button type="submit" class="btn btn-success text-light m-r-10 float-end">Save</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>



    </div>
@endsection
