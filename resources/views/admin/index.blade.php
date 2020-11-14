@extends('layouts.master')
@section('title','My Profile')
@section('main_content')
    <div class="row justify-content-center mt-3">
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3>My Profile</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr class="text-center">
                            <td colspan="2">
                                <img src="{{asset($admin->image)}}" alt="" class="w-25 rounded-circle">
                            </td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>{{ucwords($admin->name)}}</td>
                        </tr>
                        <tr>
                            <th>Role</th>
                            <td>
                                @if($admin->status == 0)
                                    <span class="badge badge-info">Salesman</span>
                                @elseif($admin->status == 1)
                                    <span class="badge badge-success">Admin</span>
                                @elseif($admin->status == 3)
                                    <span class="badge badge-danger">Blocked</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Added By</th>
                            <td>{{$admin->added_by}}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{$admin->email}}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>{{ucwords($admin->phone)}}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{ucwords($admin->address)}}</td>
                        </tr>
                        <tr>
                            <th>Joined Date</th>
                            <td>{{ucwords($admin->created_at)}}</td>
                        </tr>
                        <tr>
                            <th>Last Profile Updated </th>
                            <td>{{$admin->updated_at->diffForHumans()}}</td>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop