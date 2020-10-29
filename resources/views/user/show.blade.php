@extends('user.user_layouts')
@section('title', 'Single User Info')

@section('breadcrumb')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Users</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Single User Info</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection
@section('user_content')
<div class="card">
    <div class="card-body">
    <h3><b>{{$user->name}}'s</b> Information</h3>
    <hr>
            <table class="table table-striped table-bordered">
                <tbody>
                  <tr>
                    <th>Group  </th>
                    <td>{{ ucwords($user->group->title)}}</td>
                    </tr>
                    <tr>
                    <th>Name  </th>
                    <td>{{ $user->name}}</td>
                    </tr>
                     <tr>
                    <th>Email  </th>
                    <td>{{ $user->email}}</td>
                    </tr>
                     <tr>
                    <th>Phone  </th>
                    <td>{{ $user->phone}}</td>
                    </tr>
                     <tr>
                    <th>Address  </th>
                    <td>{{ $user->address}}</td>
                    </tr>
                </tbody>
                </table>
    </div>
</div>
@endsection