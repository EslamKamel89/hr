@extends('admin.layouts.layout')
@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    @if (Session::has('danger'))
        <div class="alert alert-danger">
            {{ Session::get('danger') }}
        </div>
    @endif
    <!-- ============================================================== -->
    <!-- Info box -->
    <!-- ============================================================== -->
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">

                    <h4 class="card-title col-md-10">Companies:{{$companies_num[0]->total}}</h4>
                    <nav aria-label="breadcrumb" class="col-md-2 float-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="#">Companies</a></li>
                        </ol>
                    </nav>
                </div>
                <div class="row m-2">
                    <a href="{{ route('companies.create') }}" class="btn btn-dark col-md-3">Add Company</a>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th></th>
                                <th>Name</th>
                                <th>Domaine</th>
                                <th>Created at</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($companies) > 0)

                                @php
                                    $id = 1;
                                @endphp
                                @foreach ($companies as $company)
                                    <tr>
                                        <td>{{ $id++ }}</td>
                                        <td><img src="{{asset('uploads/companies/logos')}}/{{ $company->logo }}" alt=""></td>
                                        <th>{{ $company->name }}</th>
                                        <th>{{ $company->domain }}</th>
                                        <td>{{ $company->created_at }}</td>
                                        <td>
                                            <a href="{{ route('companies.edit', $company->id) }}"
                                                class="btn btn-dark"><i class="mdi mdi-table-edit"></i>Edit</a>
                                            <a class="btn btn-danger text-light"
                                                onclick="event.preventDefault();
                                                     document.getElementById('delete-form-'+{{ $company->id }}).submit();">
                                                <i class="mdi mdi-delete "></i>Delete
                                            </a>

                                            <form id="delete-form-{{ $company->id }}"
                                                action="{{ route('companies.destroy', $company->id) }}"
                                                method="POST" class="d-none">
                                                @csrf
                                                @method('DELETE')
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach

                            @else
                            <tr>
                                <td class="text-center" colspan="8">
                                    No records found
                                </td>
                            </tr>
                            @endif

                        </tbody>
                    </table>
                    <div class="d-flex mt-5">
                        {!! $companies->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
