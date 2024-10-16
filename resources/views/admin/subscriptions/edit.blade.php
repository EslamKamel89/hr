@extends('admin.layouts.layout')
@section('content')
    <div class="row">

        <h4 class="card-title col-md-8">Edit Subscription</h4>
        <nav aria-label="breadcrumb" class="col-md-4 float-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                <li class="breadcrumb-item "><a href="{{ route('subscriptions.index') }}">Subscriptions</a></li>
                <li class="breadcrumb-item "><a href="">Edit Subscription</a></li>
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
                        <form class="col-md-12" action="{{ route('subscriptions.update',$subscription->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="exampleInputEmail111">Name</label>
                                    <input type="text" value="{{$subscription->name}}"
                                        class="form-control  @error('name')
                                        is-invalid
                                    @enderror"
                                        id="exampleInputEmail111" name="name" placeholder="Enter Package  name" autofocus autocomplete="">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail111">Number of companies</label>
                                    <input type="number" value="{{$subscription->company_no}}"
                                        class="form-control  @error('company_no')
                                        is-invalid
                                    @enderror"
                                        id="exampleInputEmail111" name="company_no" placeholder="Enter number of companies">
                                    @error('company_no')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail111">Number of departments</label>
                                    <input type="number" value="{{$subscription->department_no}}"
                                        class="form-control  @error('department_no')
                                        is-invalid
                                    @enderror"
                                        id="exampleInputEmail111" name="department_no" placeholder="Enter number of departments">
                                    @error('department_no')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail111">Number of employees</label>
                                    <input type="number" value="{{$subscription->employees_no}}"
                                        class="form-control  @error('employees_no')
                                        is-invalid
                                    @enderror"
                                        id="exampleInputEmail111" name="employees_no" placeholder="Enter number of employees">
                                    @error('employees_no')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail111">Period</label>
                                    <input type="number" value="{{$subscription->period}}"
                                        class="form-control  @error('period')
                                        is-invalid
                                    @enderror"
                                        id="exampleInputEmail111" name="period" placeholder="Enter the period of subscription">
                                    @error('period')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail111">Price</label>
                                    <input type="number" value="{{$subscription->value}}"
                                        class="form-control  @error('value')
                                        is-invalid
                                    @enderror"
                                        id="exampleInputEmail111" name="value" placeholder="Enter the price of subscription">
                                    @error('value')
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
