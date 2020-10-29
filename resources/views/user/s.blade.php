@extends('user.user_layouts')
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
@section('user_card')
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
                    <td>{{ ucwords($users->group->title)}}</td>
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