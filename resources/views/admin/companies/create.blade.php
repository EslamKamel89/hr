@extends('admin.layouts.layout')
@section('content')
    <div class="row">

        <h4 class="card-title col-md-8">Add Company</h4>
        <nav aria-label="breadcrumb" class="col-md-4 float-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a class="text-dark" href="{{ route('admin') }}">Dashboard</a></li>
                <li class="breadcrumb-item "><a class="text-dark " href="{{ route('companies.index') }}">Companies</a></li>
                <li class="breadcrumb-item "><a class="text-dark " href="">Add Company</a></li>
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
                        <form class="col-md-12" action="{{ route('companies.store') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail111">Name</label>
                                    <input type="text" value=""
                                        class="form-control  @error('name')
                                        is-invalid
                                    @enderror"
                                        id="exampleInputEmail111" name="name" placeholder="Enter Company  name" autofocus
                                        autocomplete="">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail111">Default Letter Head</label>
                                    <input type="text" value=""
                                        class="form-control  @error('dlh')
                                        is-invalid
                                    @enderror"
                                        id="exampleInputEmail111" name="details[dlh]"
                                        placeholder="Enter default left header" autofocus autocomplete="">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail111">Abbr.</label>
                                    <input type="text" value=""
                                        class="form-control  @error('abbr')
                                        is-invalid
                                    @enderror"
                                        id="exampleInputEmail111" name="details[abbr]" placeholder="Enter abbr" autofocus
                                        autocomplete="">
                                    @error('abbr')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail111">TAX ID</label>
                                    <input type="text" value=""
                                        class="form-control  @error('taxid')
                                        is-invalid
                                    @enderror"
                                        id="exampleInputEmail111" name="details[taxid]" placeholder="Enter tax id" autofocus
                                        autocomplete="">
                                    @error('taxid')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail111">Country</label>
                                    <select name="details[country_id]" value=""
                                        class="form-control  @error('country_id') is-invalid @enderror" autofocus
                                        autocomplete="">
                                        <option value="">select country please</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('country_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail111">Currency</label>
                                    <select name="details['currency_id']" value=""
                                        class="form-control  @error('currency_id') is-invalid @enderror" autofocus
                                        autocomplete="">
                                        <option value="">select currency please</option>
                                        @foreach ($countries as $currency)
                                            <option value="{{ $currency->id }}">{{ $currency->currency_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('currency_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail111">Domain</label>
                                    <input type="text" value=""
                                        class="form-control  @error('domain')
                                        is-invalid
                                    @enderror"
                                        id="exampleInputEmail111" name="domain" placeholder="Enter domain">
                                    @error('domain')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail111">Date of Establishment</label>
                                    <input type="date" value=""
                                        class="form-control  @error('establish_date')
                                        is-invalid
                                    @enderror"
                                        id="exampleInputEmail111" name="details[establish_date]"
                                        placeholder="Date of Establishment">
                                    @error('establish_date')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                          <input type="checkbox" name="details[isgroup]" value="1"class="form-check-input">
                                          Is group
                                        <i class="input-helper"></i></label>
                                      </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail111">Parent Company</label>
                                    <select name="details[parent_id]" value=""
                                        class="form-control  @error('parent_id') is-invalid @enderror" autofocus
                                        autocomplete="">
                                        <option value="">select parent please</option>
                                        @foreach ($parents as $parent)
                                            <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('parent_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label>Logo</label>
                                    <input type="file" name="logo"
                                        class="file-upload-default @error('logo')
                                        is-invalid
                                    @enderror">
                                    <div class="input-group col-xs-12">
                                        {{-- <input type="text" class="form-control file-upload-info" disabled
                                            placeholder="Upload Image"> --}}
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-dark" type="button">Upload</button>
                                        </span>
                                    </div>
                                    @error('logo')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-dark col-md-2 float-end">Save</button>

                </form>
            </div>
        </div>
    </div>
    </div>



    </div>
@endsection
