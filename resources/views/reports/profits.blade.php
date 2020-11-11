@extends('layouts.master')
@section('title', 'Profit Report')
@section('main_content')
    <div class="row no-gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-4">
                            <h3 class="mb-0" style="display: inline-block">Profits Report</h3>
                        </div>
                        <div class="col-8">

                            <form action="{{route('reports.profits')}}" method="get">

                                <div class="row no-gutters">
                                    <div class="col-4">
                                        <input type="date" class="form-control" name="start_date" value="{{$start_date}}">
                                    </div>

                                    <div class="col-4">
                                        <input type="date" class="form-control" name="end_date" value="{{$end_date}}">
                                    </div>
                                    <div class="col-4">
                                        <button class="btn btn-primary btn-sm">Search</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h4 class="text-primary">Profit Report From <b>{{$start_date}}</b> to <b>{{$end_date}}</b></h4>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-striped table-borderless" style="width:100%">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Product Name</th>
                                <th>Cost Price</th>
                                <th>Quantity</th>
                                <th>Sell Price</th>
                                <th>Profit</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                            $total = 0;
                            @endphp
                            @foreach($sales as $sale)
                                <tr>
                                    <td>{{$sale->date}}</td>
                                    <td>{{$sale->title}}</td>
                                    <td>${{$sale->cost_price}}</td>
                                    <td>{{$sale->quantity}}</td>
                                    <td>${{$sale->price}}</td>
                                    <td>${{($sale->price - $sale->cost_price) * $sale->quantity}}</td>
                                </tr>
                                @php
                                    $total +=($sale->price - $sale->cost_price) * $sale->quantity;
                                @endphp
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <th>Total Items : </th>
                                <td>{{$sales->sum('quantity')}}</td>
                                <th>Total : </th>
                                <td>${{$total}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
