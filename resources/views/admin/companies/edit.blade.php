@extends('admin.layouts.layout')
@section('content')
    <div class="row">

        <h4 class="card-title col-md-8">Add Company</h4>
        <nav aria-label="breadcrumb" class="col-md-4 float-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                <li class="breadcrumb-item "><a href="{{ route('companies.index') }}">Companies</a></li>
                <li class="breadcrumb-item "><a href="">Add Company</a></li>
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
                        <form class="col-md-12" action="{{ route('companies.update', $company->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="#general"
                                            onclick="openTab('general')" id="id_general">Details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#contacts" onclick="openTab('contacts')"
                                            id="id_contacts">Accounts</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#license" onclick="openTab('license')"
                                            id="id_license">License</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#member" onclick="openTab('member')"
                                            id="id_member">Members</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#activity" onclick="openTab('activity')"
                                            id="id_activity">Activites</a>
                                    </li>

                                </ul>
                            </div>
                            <div id="general" class="tabcard">
                                <div class="row">

                                    <div class="form-group col-md-12">
                                        <label for="exampleInputEmail111">Name</label>
                                        <input type="text" value="{{ $company->name }}"
                                            class="form-control  @error('name')
                                        is-invalid
                                    @enderror"
                                            id="exampleInputEmail111" name="name" placeholder="Enter Company  name"
                                            autofocus autocomplete="">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="form-group col-md-5">
                                        <label for="exampleInputEmail111">Domain</label>
                                        <input type="text" value="{{ $company->domain }}"
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

                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label>Logo</label>
                                        <input type="file" name="logo"
                                            class="file-upload-default @error('logo')
                                        is-invalid
                                    @enderror">
                                        <img src="{{ asset('uploads/companies/logos') }}/{{ $company->logo }}"
                                            width="200" height="200" alt="">
                                        <div class="input-group col-xs-12">
                                            <input type="text" class="form-control file-upload-info" disabled
                                                placeholder="Upload Image">
                                            <span class="input-group-append">
                                                <button class="file-upload-browse btn btn-primary"
                                                    type="button">Upload</button>
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

                            <div class="tabcard card row p-1 mb-3" id="contacts" style="display: none">
                                <div class="row p-3">
                                    <div id="input_contacts">
                                        @foreach ($contacts as $contact)
                                            <script>
                                                setContacts({{ $contact->id }})
                                            </script>
                                            <div class="row" id="contact_{{ $contact->id }}">
                                                <div class="form-group col-md-5">
                                                    <label for="exampleInputEmail111">Name</label>
                                                    <input type="text" value="{{ $contact->name }}"
                                                        class="form-control  @error('contact_name')
                                                is-invalid
                                              @enderror"
                                                        id="exampleInputEmail111" name="contact[name][]"
                                                        placeholder="Enter contact  name" autofocus autocomplete="">
                                                    @error('contact_name')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-5">
                                                    <label for="exampleInputEmail111">Value</label>
                                                    <input type="text" value="{{ $contact->value }}"
                                                        class="form-control  @error('value')
                                                is-invalid
                                              @enderror"
                                                        id="exampleInputEmail111" name="contact[value][]"
                                                        placeholder="Enter contact  value" autofocus autocomplete="">
                                                    @error('value')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-1">
                                                    <div class="btn btn-danger"
                                                        onclick="removeThisItem(`contact_{{ $contact->id }}`)"><i
                                                            class="mdi mdi-close "></i></div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="btn btn-primary col-md-2 text-light mb-4 ms-3" id="btncontacts"
                                        onclick="addContact()">Add more</div>
                                </div>

                            </div>
                            <div class="tabcard card row p-1 mb-3" id="license" style="display: none">
                                <div id="input_license">

                                    <div class="row p-3" id="licenses">

                                        @foreach ($licenses as $license)
                                            <div class="row" id="license_{{ $license->id }}">
                                                <script>
                                                    setLicenses({{ $license->id }})
                                                </script>
                                                <div class="form-group col-md-4">
                                                    <label for="exampleInputEmail111">License</label>
                                                    <input type="text" value="{{ $license->license }}"
                                                        class="form-control" id="exampleInputEmail111"
                                                        name="license[name][]" placeholder="Enter License name" autofocus
                                                        autocomplete="">

                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="exampleInputEmail111">Start date</label>
                                                    <input type="date" value="{{ $license->start_date }}"
                                                        class="form-control" id="exampleInputEmail111"
                                                        name="license[start][]" placeholder="Enter license start"
                                                        autofocus autocomplete="">
                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label for="exampleInputEmail111">End date</label>
                                                    <input type="date" value="{{ $license->end_date }}"
                                                        class="form-control" id="exampleInputEmail111"
                                                        name="license[end][]" placeholder="Enter license start" autofocus
                                                        autocomplete="">
                                                </div>

                                                <div class="col-md-2">
                                                    <div class="btn btn-danger"
                                                        onclick="removeThisItem(`license_{{ $license->id }}`)"><i
                                                            class="mdi mdi-close "></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>


                                    <div class="btn btn-primary col-md-2 text-light mb-4 ms-3" id="btnlicense"
                                        onclick="addLicense()">Add more</div>
                                </div>
                            </div>
                            <div class="tabcard card row p-1 mb-3" id="member" style="display: none">
                                <div id="input_memder">
                                    <div class="row p-3" id="members">
                                        @foreach ($members as $member)
                                            <script>
                                                setMembers({{ $member->id }})
                                            </script>
                                            <div class="card  row p-1 border-1 m-2 col-md-12"
                                                id="member_{{ $member->id }}">
                                                <div class="row">
                                                    <div class="form-group col-md-5">
                                                        <label for="exampleInputEmail111">National Id</label>
                                                        <input type="text" value="{{ $member->national_id }}"
                                                            class="form-control" id="exampleInputEmail111"
                                                            name="member[national_id][]" placeholder="Enter national id"
                                                            autofocus autocomplete="">
                                                    </div>
                                                    <div class="form-group col-md-5">
                                                        <label for="exampleInputEmail111">Member name</label>
                                                        <input type="text" value="{{ $member->name }}"
                                                            class="form-control" id="exampleInputEmail111"
                                                            name="member[name][]" placeholder="Enter member name"
                                                            autofocus autocomplete="">
                                                    </div>
                                                </div>
                                                <div class="row">

                                                    <div class="form-group col-md-4">
                                                        <label for="exampleInputEmail111">Member nationality</label>
                                                        <select name="member[nationality][]" class="form-control"
                                                            id="">
                                                            <option value="">Please select nationality</option>
                                                            <option value="1">Egypt</option>
                                                            <option value="2">UAE</option>
                                                            <option value="3">India</option>
                                                            <option value="3">Pakistan</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="exampleInputEmail111">Role</label>
                                                        <input type="text" value="{{ $member->role }}"
                                                            class="form-control" id="exampleInputEmail111"
                                                            name="member[role][]" placeholder="Enter member role"
                                                            autofocus autocomplete="">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="exampleInputEmail111">Percent</label>
                                                        <input type="text" value="{{ $member->percent }}"
                                                            class="form-control" id="exampleInputEmail111"
                                                            name="member[percent][]" placeholder="Enter member percent"
                                                            autofocus autocomplete="">
                                                    </div>

                                                    <div class="col-md-2">
                                                        <div class="btn btn-danger"
                                                            onclick="removeThisItem(`member_{{ $member->id }}`)">
                                                            <i class="mdi mdi-close "></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                    <div class="btn btn-primary col-md-2 text-light mb-4 ms-3" id="btnMember"
                                        onclick="addMember()">Add more</div>
                                </div>
                            </div>

                            <div class="tabcard card row p-1 mb-3" id="activity" style="display: none">
                                <div id="input_activity">
                                    <div class="row p-3" id="activities">
                                        @foreach ($activities as $activity)
                                            <script>
                                                setActivities({{ $activity->id }})
                                            </script>
                                            <div class="row" id="activity_{{ $activity->id }}">

                                                <div class="form-group col-md-10">
                                                    <label for="exampleInputEmail111">Name</label>
                                                    <input type="text" value="{{ $activity->name }}"
                                                        class="form-control col-md-12" id="exampleInputEmail111"
                                                        name="activity[name][]" placeholder="Enter activity name"
                                                        autofocus autocomplete="">
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="btn btn-danger"
                                                        onclick="removeThisItem(`activity_{{ $activity->id }}`)"><i
                                                            class="mdi mdi-close "></i></div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>

                                    <div class="btn btn-primary col-md-2 text-light mb-4 ms-3" id="btnActivity"
                                        onclick="addActivity()">Add more</div>
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
