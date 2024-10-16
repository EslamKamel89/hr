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

                <h4 class="card-title col-md-10">Levels</h4>
                    <nav aria-label="breadcrumb" class="col-md-2 float-end">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
                          <li class="breadcrumb-item active"><a href="#">Levels</a></li>
                        </ol>
                      </nav>
                </div>
                <div class="row m-2">
                    <a href="{{route('levels.create')}}" class="btn btn-dark col-md-3">Add Level</a>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Level name</th>
                                <th>Created at</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $id = 1;
                            @endphp
                            @foreach ($levels as $level)
                                <tr>
                                    <td>{{ $id++ }}</td>
                                    <td>{{ $level->name }}</td>
                                    <td>{{ $level->created_at }}</td>
                                    <td >
                                        <a href="{{ route('levels.edit', $level->id) }}" class="btn btn-dark"><i class="mdi mdi-table-edit"></i></a>
                                        <a class="btn btn-danger"
                                            onclick="event.preventDefault();
                                                     document.getElementById('delete-form-'+{{$level->id}}).submit();">
                                            <i class="mdi mdi-delete "></i>
                                        </a>

                                        <form id="delete-form-{{$level->id}}" action="{{ route('levels.destroy', $level->id) }}"
                                            method="POST" class="d-none">
                                            @csrf
                                            @method('DELETE')
                                        </form>

                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
