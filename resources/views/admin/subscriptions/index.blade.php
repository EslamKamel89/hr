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

                    <h4 class="card-title col-md-10">Subscriptions</h4>
                    <nav aria-label="breadcrumb" class="col-md-2 float-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="#">Subscriptions</a></li>
                        </ol>
                    </nav>
                </div>
                <div class="row m-2">
                    <a href="{{ route('subscriptions.create') }}" class="btn btn-dark col-md-3">Add Subscription</a>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Companies</th>
                                <th>Departments</th>
                                <th>Employees</th>
                                <th>Price</th>
                                <th>Created at</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($subscriptions) > 0)

                                @php
                                    $id = 1;
                                @endphp
                                @foreach ($subscriptions as $subscription)
                                    <tr>
                                        <td>{{ $id++ }}</td>
                                        <td>{{ $subscription->name }}</td>
                                        <th>{{ $subscription->company_no }}</th>
                                        <th>{{ $subscription->department_no }}</th>
                                        <th>{{ $subscription->employees_no }}</th>
                                        <th>{{ $subscription->value }}</th>
                                        <td>{{ $subscription->created_at }}</td>
                                        <td>
                                            <a href="{{ route('subscriptions.edit', $subscription->id) }}"
                                                class="btn btn-dark"><i class="mdi mdi-table-edit"></i></a>
                                            <a class="btn btn-danger"
                                                onclick="event.preventDefault();
                                                     document.getElementById('delete-form-'+{{ $subscription->id }}).submit();">
                                                <i class="mdi mdi-delete "></i>
                                            </a>

                                            <form id="delete-form-{{ $subscription->id }}"
                                                action="{{ route('subscriptions.destroy', $subscription->id) }}"
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
                </div>
            </div>
        </div>
    </div>
@endsection
