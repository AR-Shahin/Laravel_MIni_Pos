@extends('layouts.master')
@section('title', 'User')
@section('css_files')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/vendor/datatables/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/vendor/datatables/css/buttons.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/vendor/datatables/css/select.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/vendor/datatables/css/fixedHeader.bootstrap4.css">
@endsection
@section('breadcrumb')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Tables</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Tables</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('main_content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0" style="display: inline-block">Users</h3>
                    <a href="{{ url('users/create') }}" class="btn btn-outline-info" style="float: right"><i class="fa fa-plus mr-1"></i> New User</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Group</th>
                                <th>Admin</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i=1;
                            @endphp
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $i++}}</td>
                                    <td>{{ optional($user->group)->title }}</td>
                                    <td>{{$user->admin->name}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>{{$user->address}}</td>
                                    <td>
                                        <a href="{{ url('users').'/'.$user->id }}" class="btn btn-secondary btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal_{{ $user->id }}"><i class="fa fa-edit text-light"></i></a>
                                        @if($user->sales->count() == 0 && $user->purchases->count() == 0 && $user->payments->count() == 0 && $user->receipts->count() == 0)
                                            <form method="POST" action=" {{ url('users/'.$user->id)}} " style="display:inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i></button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- Edit modal --}}
@foreach($users as $user)
    <div id="editModal_{{ $user->id }}" class="modal fade">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content bd-0 tx-14">
                <div class="modal-header pd-x-20">
                    <h3 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Edit <small class="text-info">{{ $user->name}}</small>'s Information</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pd-20">
                    <form action="{{ url('users').'/'.$user->id}}" method="POST" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <div class="row">
                                <div class="col-4">
                                    <label for="grp">User Group <span class="text-danger">*</span></label>
                                </div>
                                <div class="col-8">
                                    <select name="group_id" id="grp" class="form-control  @error('group_id') is-invalid @enderror" value="">
                                        <option value="">Select Group</option>
                                        @foreach($groups as $group)
                                            <option value="{{ $group->id }}" {{ $group->id == $user->group_id ? 'selected' : '' }}>{{ ucwords($group->title) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-4">
                                    <label for="nm">Name <span class="text-danger">*</span></label>
                                </div>
                                <div class="col-8">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id = "nm" value="{{ $user->name}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-4">
                                    <label for="phone">Phone <span class="text-danger">*</span></label>
                                </div>
                                <div class="col-8">
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id = "phone" value="{{ $user->phone}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-4">
                                    <label for="email">Email <span class="text-danger">*</span></label>
                                </div>
                                <div class="col-8">
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id = "email" value="{{ $user->email}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-4">
                                    <label for="address">Address <span class="text-danger">*</span></label>
                                </div>
                                <div class="col-8">
                                    <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id = "address" value="{{ $user->address}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-block btn-primary"><i class="fa fa-pencil-square mr-1"></i> Update User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- modal-dialog -->
    </div><!-- modal -->
@endforeach
@section('scripts')
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets') }}/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('assets') }}/vendor/datatables/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('assets') }}/vendor/datatables/js/data-table.js"></script>
@endsection