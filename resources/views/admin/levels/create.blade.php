@extends('admin.layouts.layout')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Add Level</h4>
                <div class="d-flex align-items-center">

                </div>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex no-block justify-content-end align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('levels.index') }}">All levels</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Add level</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
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
                            <form class="col-md-12" action="{{ route('levels.store') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="exampleInputEmail111">Name</label>
                                        <input type="text"
                                            value="{{old('name')}}"
                                            class="form-control  @error('name')
                                        is-invalid
                                    @enderror"
                                            id="exampleInputEmail111" name="name" placeholder="Insert level">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                </div>
                                @foreach ($levels as $name => $level)
                                    <div class="level p-3 m-3 card " onclick="checkOpen('{{$name}}')">
                                        <h4>{{ $name }}:</h4>
                                        <div class="card" data-toggle="buttons" id="check_{{$name}}" style="display: none">
                                            @foreach ($level as $class => $value)
                                                <div class="row col-md-5 text-start mb-2 mt-2 ms-1">
                                                     <label class="">
                                                    {{-- <div class="custom-control custom-checkbox mr-sm-2 col-md-4"> --}}
                                                        <input type="checkbox" value="1" name="{{ $value['name'] }}"
                                                            class="custom-control-input" id="checkbox0">
                                                        <label class="custom-control-label"
                                                            for="checkbox0">{{ $value['text'] }}</label>
                                                    {{-- </div> --}}
                                                </label></div>
                                            @endforeach


                                        </div>
                                    </div>
                                @endforeach
                                <button type="submit" class="btn btn-success m-r-10 text-light">Save</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
