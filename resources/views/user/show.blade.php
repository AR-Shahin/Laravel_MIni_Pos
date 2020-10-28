@extends('layouts.master')
@section('title', 'Single User')
@section('breadcrumb')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Users</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Single User</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection
@section('main_content')
 <div class="row">
            <div class="col-4">
                <a href="{{ url('users')}}" class="btn btn-secondary"><i class="fa fa-angle-left mr-1" aria-hidden="true"></i> Back</a>
            </div>
             <div class="col-8 text-right">
                <a href="" class="btn btn-secondary"><i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="" class="btn btn-secondary"><i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="" class="btn btn-secondary"><i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="" class="btn btn-secondary"><i class="fa fa-eye" aria-hidden="true"></i></a>
            </div>
        </div>
        <hr>
<div class="card">
    <div class="card-body">
        <div class="row justify-content-center">

            <div class="col-8">
                <h3>{{ $users->name}}'s Data.</h3>
                <hr>
              <table class="table table-striped">
                <tbody>
                  <tr>
                    <th>Group : </th>
                    <td>{{ $users->group_id}}</td>
                    </tr>
                    <tr>
                    <th>Name : </th>
                    <td>{{ $users->name}}</td>
                    </tr>
                     <tr>
                    <th>Email : </th>
                    <td>{{ $users->email}}</td>
                    </tr>
                     <tr>
                    <th>Phone : </th>
                    <td>{{ $users->phone}}</td>
                    </tr>
                     <tr>
                    <th>Address : </th>
                    <td>{{ $users->address}}</td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection