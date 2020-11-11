@extends('layouts.master')
@section('title', 'Product Stock')
@section('css_files')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/vendor/datatables/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/vendor/datatables/css/buttons.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/vendor/datatables/css/select.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/vendor/datatables/css/fixedHeader.bootstrap4.css">
@endsection
@section('main_content')
    <div class="row no-gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0" style="display: inline-block">Stock Product</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example4" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Product Name</th>
                                <th>Category</th>
                                <th>Purchase</th>
                                <th>Sale</th>
                                <th>Stock</th>
                            </tr>
                            </thead>
                            <tbody class="text-center">
                            @php
                                $i=1;
                            @endphp
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $i++}}</td>
                                    <td>{{ $product->title}}</td>
                                    <td>{{ $product->category->title }}</td>
                                    <td>{{$PurchaseItems =  $product->purchaseItems->sum('quantity') }} {{$product->unit}}</td>
                                    <td>{{ $SaleItems = $product->saleItems->sum('quantity') }} {{$product->unit}}</td>
                                    <td>
                                        @php
                                            $Stock = $PurchaseItems - $SaleItems;
                                        @endphp
                                        @if($Stock<=0)
                                            <span class="badge badge-danger">{{$Stock}} {{$product->unit}}</span>
                                        @else
                                            {{ $Stock }} {{$product->unit}}
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

@section('scripts')
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets') }}/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('assets') }}/vendor/datatables/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('assets') }}/vendor/datatables/js/data-table.js"></script>
@endsection