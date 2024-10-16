@extends('admin.layouts.layout')
@section('content')
    <div class="row">

        <h4 class="card-title col-md-8">Level Edit</h4>
        <nav aria-label="breadcrumb" class="col-md-4 float-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                <li class="breadcrumb-item "><a href="{{ route('levels.index') }}">Levels</a></li>
                <li class="breadcrumb-item "><a href="">Level edit</a></li>
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
                        <form class="col-md-12" action="{{ route('levels.update', $level->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="exampleInputEmail111">Name</label>
                                    <input type="text" value="{{ $level->name }}"
                                        class="form-control  @error('name')
                                        is-invalid
                                    @enderror"
                                        id="exampleInputEmail111" name="name" placeholder="Enter level name">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                            </div>
                            @foreach ($levels as $name => $level_main)
                                <div class="card ps-2 pt-2 pb-1 pe-1 m-3 " onclick="checkOpen('{{ $name }}')">
                                    <h4 class="card-title">{{ $name }}</h4>

                                    <div class="card" data-toggle="buttons" id="check_{{ $name }}"
                                        style="display: none">
                                        @foreach ($level_main as $class => $value)
                                            <div class="row col-md-5 text-start mb-2 mt-2 ms-1">
                                                <label class="">
                                                    <input type="checkbox" value="1" name="{{ $value['name'] }}"
                                                        class="custom-control-input" id="checkbox0"
                                                        @if ($level[$value['name']] == '1') checked @endif>
                                                    <label class="custom-control-label"
                                                        for="checkbox0">{{ $value['text'] }}</label>
                                                    {{-- </div> --}}
                                                </label>
                                            </div>
                                        @endforeach


                                    </div>
                                </div>
                            @endforeach
                            <button type="submit" class="btn btn-success m-r-10">Save</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>



    </div>
@endsection
