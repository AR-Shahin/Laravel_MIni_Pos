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
                        <li class="breadcrumb-item active" aria-current="page">Single User Sales Info</li>
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
        <div class="row justify-content-center">

            <div class="col-12">
                <h3>Sales of <b>{{ $user->name}}</b></h3>
                <hr>
              
              <div class="table-responsive">
                    <table id="example3" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Challan No</th>
                                <th>Customer Name</th>
                                <th>Admin Name</th>
                                <th>Date</th>
                                <th>Total</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                    <tbody>
                    @foreach($user->sales as $sale)
                           <tr>
                        <td>{{ $sale->challan_no}}</td>
                        <td>{{ $user->name}}</td>
                        <td>{{ $user->admin->name}}</td>
                        <td>{{ $sale->date}}</td>
                        <td>100</td>
                        <td class="text-center">
                            <form method="POST" action=" {{ url('product/'.$sale->id)}} " style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i></button>
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