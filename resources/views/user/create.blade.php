@extends('layouts.master')
@section('title', 'Create User')
@section('breadcrumb')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Users</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create User</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection
@section('main_content')
<div class="card">
    <div class="card-body">
        <div class="row justify-content-center">
            <div class="col-8">
                <h3>Add New User</h3>
                <hr>
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-4">
                                <label for="grp">User Group <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-8">
                                <select name="group_id" id="grp" class="form-control  @error('group_id') is-invalid @enderror" value="">
                                    <option value="">Select Group</option>
                                @foreach($groups as $group)
                                <option value="{{ $group->id }}">{{ ucwords($group->title) }}</option>
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
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id = "nm" placeholder="Name" value="{{ old('name')}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-4">
                                <label for="phone">Phone <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id = "phone" placeholder="Phone" value="{{ old('phone')}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-4">
                                <label for="email">Email <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id = "email" placeholder="Email" value="{{ old('email')}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-4">
                                <label for="address">Address <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id = "address" placeholder="Address" value="{{ old('address')}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-12">
                               <button type="submit" class="btn btn-success btn-block"><i class="fa fa-plus mr-1"></i> Add New User</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection