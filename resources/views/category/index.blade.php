@extends('layouts.master')
@section('title', 'Category')
@section('css_files')
<link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/vendor/datatables/css/dataTables.bootstrap4.css">
<link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/vendor/datatables/css/buttons.bootstrap4.css">
<link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/vendor/datatables/css/select.bootstrap4.css">
<link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/vendor/datatables/css/fixedHeader.bootstrap4.css">
@endsection
@section('main_content')
<div class="row no-gutters">
    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0" style="display: inline-block">Manage Categroy</h3>
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
                        @foreach($categories as $cat)
                        <tr>
                        <td>{{ $i++}}</td>
                        <td>{{ $cat->title}}</td>
                        <td class="text-center">
                        <a  data-toggle="modal" data-target="#editModal_{{ $cat->id }}" class="btn btn-primary text-light btn-sm"><i class="fa fa-edit" aria-hidden="true"></i></a>
                         <form method="POST" action=" {{ url('category/'.$cat->id)}} " style="display:inline-block">
		              		@csrf
		              		@method('DELETE')
		              		<button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i></button>	
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
     <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0" style="display: inline-block">Add Categroy</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('category.store')}}" method="POST" method="POST">
          @csrf
          <input type="hidden"  value="" name="old_img">
          <label for="">Categroy Name : </label>
         <div class="input-group">
           <input type="text" class="form-control @error('title') is-invalid @enderror" value="" name="title" placeholder="Category name">
         </div>
         <div class="form-group mt-3">
           <button type="submit" class="btn btn-block btn-primary"><i class="fa fa-pencil-square mr-1"></i>Add Categroy</button>
         </div>
        </form>
            </div>
        </div>
    </div>
</div>
@endsection
{{-- Edit modal --}}
 @foreach($categories as $cat)
<div id="editModal_{{$cat->id}}" class="modal fade">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content bd-0 tx-14">
      <div class="modal-header pd-x-20">
        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Edit Group</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body pd-20">
        <form action="{{ url('category').'/'.$cat->id}}" method="POST">
          @csrf
          @method('PUT')
          <input type="hidden"  value="" name="old_img">
          <label for="">Categroy Name : </label>
         <div class="input-group">
           <input type="text" class="form-control" value="{{ $cat->title}}" name="title">
         </div>
         <div class="form-group mt-3">
           <button type="submit" class="btn btn-block btn-primary"><i class="fa fa-pencil-square mr-1"></i> Update Category</button>
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