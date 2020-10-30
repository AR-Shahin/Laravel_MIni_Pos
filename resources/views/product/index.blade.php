@extends('layouts.master')
@section('title', 'Product')
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
<li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Products</a></li>
<li class="breadcrumb-item active" aria-current="page">Product</li>
</ol>
</nav>
</div>
</div>
</div>
</div>
@endsection
@section('main_content')
<div class="row no-gutters">
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
<div class="card">
<div class="card-header">
<h3 class="mb-0" style="display: inline-block">Manage Product</h3>
<a style="float:right" data-toggle="modal" data-target="#addProduct" class="btn btn-primary  text-light btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Add Product</a>
</div>
<div class="card-body">
<div class="table-responsive">
<table id="example3" class="table table-striped table-bordered" style="width:100%">
<thead>
<tr>
<th>SL</th>
<th>Product Name</th>
<th>Categroy</th>
<th>Cost Price</th>
<th>Sell Price</th>
<th>Unit</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
@php
$i=1;
@endphp
@foreach($products as $product)
<tr>
<td>{{ $i++}}</td>
<td>{{ $product->title}}</td>
<td>{{ $product->category->title }}</td>
<td>${{ $product->cost_price}}</td>
<td>${{ $product->price}}</td>
<td>{{ $product->unit}}</td>
<td class="text-center">
<a  data-toggle="modal" data-target="#viewModal_{{ $product->id }}" class="btn btn-secondary text-light btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a>
<a  data-toggle="modal" data-target="#editModal_{{ $product->id }}" class="btn btn-primary text-light btn-sm"><i class="fa fa-edit" aria-hidden="true"></i></a>
<form method="POST" action=" {{ url('product/'.$product->id)}} " style="display:inline-block">
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
</div>
@endsection
{{-- add modal--}}
<div id="addProduct" class="modal fade">
<div class="modal-dialog modal-md" role="document">
<div class="modal-content bd-0 tx-14">
<div class="modal-header pd-x-20">
<h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add Product</h6>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body pd-20">
<form action="{{ route('product.store')}}" method="POST">
@csrf
<div class="form-group">
<div class="row">
<div class="col-4">
<label for="grp">Categroy <span class="text-danger">*</span></label>
</div>
<div class="col-8">
<select name="cat_id" id="grp" class="form-control  @error('category_id') is-invalid @enderror" value="">
<option value="">Select Categroy</option>
@foreach($categories as $cat)
<option value="{{ $cat->id }}">{{ ucwords($cat->title) }}</option>
@endforeach
</select>
</div>
</div>
</div>
<div class="form-group">
<div class="row">
<div class="col-4">
<label for="title">Product Name <span class="text-danger">*</span></label>
</div>
<div class="col-8">
<input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id = "title" placeholder="Name" value="{{ old('title')}}">
</div>
</div>
</div>
<div class="form-group">
<div class="row">
<div class="col-4">
<label for="unit">Unit <span class="text-danger">*</span></label>
</div>
<div class="col-8">
<input type="text" class="form-control @error('unit') is-invalid @enderror" name="unit" id = "unit" placeholder="Unit" value="{{ old('unit')}}">
</div>
</div>
</div>
<div class="form-group">
<div class="row">
<div class="col-4">
<label for="cost_price">Cost Price <span class="text-danger">*</span></label>
</div>
<div class="col-8">
<input type="text" class="form-control @error('cost_price') is-invalid @enderror" name="cost_price" id = "cost_price" placeholder="Cost Price" value="{{ old('cost_price')}}">
</div>
</div>
</div>
<div class="form-group">
<div class="row">
<div class="col-4">
<label for="price">Price <span class="text-danger">*</span></label>
</div>
<div class="col-8">
<input type="text" class="form-control @error('price') is-invalid @enderror" name="price" id = "price" placeholder="Price" value="{{ old('price')}}">
</div>
</div>
</div>
<div class="form-group">
<div class="row">
<div class="col-4">
<label for="price">Desription <span class="text-danger">*</span></label>
</div>
<div class="col-8">
<div class="form-group">
<textarea id="my-textarea" class="form-control  @error('description') is-invalid @enderror" name="description" rows="3"></textarea>
</div>
</div>
</div>
</div>
<div class="form-group">
<div class="row">
<div class="col-12">
<button type="submit" class="btn btn-success btn-block"><i class="fa fa-plus mr-1"></i> Add New Product</button>
</div>
</div>
</div>
</form>
</div>
</div>
</div><!-- modal-dialog -->
</div><!-- modal -->
{{-- Edit modal --}}

@foreach($products as $product)
<div id="editModal_{{$product->id}}" class="modal fade">
<div class="modal-dialog modal-md" role="document">
<div class="modal-content bd-0 tx-14">
<div class="modal-header pd-x-20">
<h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Edit Product</h6>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body pd-20">
<form action="{{ url('product').'/'.$product->id}}" method="POST">
@csrf
@method('PUT')
<div class="form-group">
<div class="row">
<div class="col-4">
<label for="grp">Categroy <span class="text-danger">*</span></label>
</div>
<div class="col-8">
<select name="cat_id" id="grp" class="form-control  @error('category_id') is-invalid @enderror" value="">
<option value="">Select Categroy</option>
@foreach($categories as $cat)
<option value="{{ $cat->id }}" {{ $cat->id === $product->cat_id ? 'selected' : ''}} >{{ ucwords($cat->title) }}</option>
@endforeach
</select>
</div>
</div>
</div>
<div class="form-group">
<div class="row">
<div class="col-4">
<label for="title">Product Name <span class="text-danger">*</span></label>
</div>
<div class="col-8">
<input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id = "title" value="{{ $product->title}}">
</div>
</div>
</div>
<div class="form-group">
<div class="row">
<div class="col-4">
<label for="unit">Unit <span class="text-danger">*</span></label>
</div>
<div class="col-8">
<input type="text" class="form-control @error('unit') is-invalid @enderror" name="unit" id = "unit" value="{{ $product->unit}}">
</div>
</div>
</div>
<div class="form-group">
<div class="row">
<div class="col-4">
<label for="cost_price">Cost Price <span class="text-danger">*</span></label>
</div>
<div class="col-8">
<input type="text" class="form-control @error('cost_price') is-invalid @enderror" name="cost_price" id = "cost_price" value="{{ $product->cost_price}}">
</div>
</div>
</div>
<div class="form-group">
<div class="row">
<div class="col-4">
<label for="price">Price <span class="text-danger">*</span></label>
</div>
<div class="col-8">
<input type="text" class="form-control @error('price') is-invalid @enderror" name="price" id = "price" value="{{ $product->price}}">
</div>
</div>
</div>
<div class="form-group">
<div class="row">
<div class="col-4">
<label for="price">Desription <span class="text-danger">*</span></label>
</div>
<div class="col-8">
<div class="form-group">
<textarea id="my-textarea" class="form-control  @error('description') is-invalid @enderror" name="description" rows="3">
{{ $product->description}}
</textarea>
</div>
</div>
</div>
</div>
<div class="form-group">
<div class="row">
<div class="col-12">
<button type="submit" class="btn btn-success btn-block"><i class="fa fa-edit mr-1"></i>Update Product</button>
</div>
</div>
</div>
</form>
</div>
</div>
</div><!-- modal-dialog -->
</div><!-- modal -->
@endforeach

{{-- show modal--}}
@foreach($products as $product)
<div id="viewModal_{{$product->id}}" class="modal fade">
<div class="modal-dialog modal-md" role="document">
<div class="modal-content bd-0 tx-14">
<div class="modal-header pd-x-20">
<h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">View Product</h6>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body pd-20">
<div class="row">
<div class="col-12">
<h3>{{ $product->title}}.</h3>
<hr>
<table class="table table-striped table-bordered">
<tbody>
<tr>
<th>Categroy  </th>
<td>{{ $product->category->title}}</td>
</tr>
<tr>
<th>Product Name  </th>
<td>{{ $product->title}}</td>
</tr>
<tr>
<th>Cost Price  </th>
<td>${{ $product->cost_price}}</td>
</tr>
<tr>
<th>Price  </th>
<td>${{ $product->price}}</td>
</tr>
<tr>
<th>Unit  </th>
<td>{{ $product->unit}}</td>
</tr>
<tr>
<th>Added Date  </th>
<td>{{ $product->created_at->diffForHumans()}}</td>
</tr>
<tr>
<th>Description  </th>
<td>{{ $product->description}}</td>
</tr>
</tbody>
</table>
</div>
</div>
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