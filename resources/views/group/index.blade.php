@extends('layouts.master')
@section('title', 'User Groups')
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
                <h3 class="mb-0" style="display: inline-block">User Groups  </h3>
                <a href="" class="btn btn-outline-info" style="float: right" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus mr-1"></i> New Group</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example3" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Title</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                    <tbody>
                        @php
                        $i=1;
                        @endphp
                        @foreach($groups as $group)
                        <tr>
                            <td>{{ $i++}}</td>
                            <td>{{ ucwords($group->title) }}</td>
                            <td class="text-center">
                                <a class="btn btn-outline-primary" data-toggle="modal" data-target="#editModal_{{ $group->id }}">Edit</a>
                                <a href="{{ url('group.destroy').'/'.$group->id }}" class="btn btn-outline-danger">Delete</a>
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
<!-- Modal -->
<form action="{{ url('user.groups') }}" method="POST">
    @csrf
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create New Group </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="title">User Group Title : </label>
                <input type="title" name="title" class="form-control" id="title" placeholder="User Group Title">
              </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary btn-block">Add Group</button>
        </div>
      </div>
    </div>
  </div>
</form>

{{-- Edit modal --}}
@foreach($groups as $group)
<div id="editModal_{{ $group->id }}" class="modal fade">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content bd-0 tx-14">
      <div class="modal-header pd-x-20">
        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Edit Group</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body pd-20">
        <form action="{{ url('group.edit').'/'.$group->id}}" method="POST" method="POST">
          @csrf
          <input type="hidden"  value="{{ $group->title }}" name="old_img">
          <label for="">Group Name : </label>
         <div class="input-group">
           <input type="text" class="form-control" value="{{ $group->title }}" name="title">
         </div>
         <div class="form-group mt-3">
           <button type="submit" class="btn btn-block btn-primary"><i class="fa fa-pencil-square mr-1"></i> Update Group</button>
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