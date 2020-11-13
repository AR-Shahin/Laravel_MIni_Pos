@extends('layouts.master')
@section('title', 'Sales Report')
@section('main_content')
    <div class="row no-gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-4">
                            <h3 class="mb-0" style="display: inline-block">Days Report</h3>
                        </div>
                        <div class="col-8">

                            <form action="{{route('reports.days')}}" method="get">

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

                    <hr>
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="card border-3 border-top border-top-primary">
                                <div class="card-body">
                                    <h5 class="text-muted">Total Sales  </h5>
                                    <div class="">
                                        <h1 class="mb-0">${{number_format($sales->sum('total'),2)}}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="card border-3 border-top border-top-primary">
                                <div class="card-body">
                                    <h5 class="text-muted">Total Purchases  </h5>
                                    <div class="">
                                        <h1 class="mb-0">${{number_format($purchases->sum('total'),2)}}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="card border-3 border-top border-top-primary">
                                <div class="card-body">
                                    <h5 class="text-muted">Total Receipts  </h5>
                                    <div class="">
                                        <h1 class="mb-0">${{number_format($receipts->sum('amount'),2)}}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="card border-3 border-top border-top-primary">
                                <div class="card-body">
                                    <h5 class="text-muted">Total Payments  </h5>
                                    <div class="">
                                        <h1 class="mb-0">${{number_format($payments->sum('amount'),2)}}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h4 class="text-primary">Sales Report From <b>{{$start_date}}</b> to <b>{{$end_date}}</b></h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-borderless table-sm" style="width:100%">
                            <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            @foreach($sales as $sale)
                                <tr>
                                    <td>{{$sale->title}}</td>
                                    <td>{{$sale->quantity}}</td>
                                    <td>${{$sale->price}}</td>
                                    <td>${{$sale->total}}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <th class="text-right">Total Items : </th>
                                <td>{{$sales->sum('quantity')}}</td>
                                <th class="text-right">Total</th>
                                <td>${{ number_format($sales->sum('total'),2)}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr>
                {{-- Purchases Reports --}}
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h5 class="m-0 font-weight-bold text-primary">Purchases Report From <strong>{{ $start_date }}</strong> to <strong>{{ $end_date }}</strong> </h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-borderless table-sm" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Products</th>
                                    <th class="text-right">Quantity</th>
                                    <th class="text-right">Price</th>
                                    <th class="text-right">Total</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach ($purchases as $purchase)
                                    <tr>
                                        <td> {{ $purchase->title }} </td>
                                        <td class="text-right"> {{ $purchase->quantity }} </td>
                                        <td class="text-right"> {{ number_format($purchase->price, 2) }} </td>
                                        <td class="text-right"> {{ number_format($purchase->total, 2) }} </td>
                                    </tr>
                                @endforeach
                                </tbody>

                                <tfoot>
                                <tr>
                                    <th class="text-right">Ttoal Items:</th>
                                    <th class="text-right"> {{ $purchases->sum('quantity') }} </th>
                                    <th class="text-right">Total:</th>
                                    <th class="text-right"> {{ number_format($purchases->sum('total'), 2) }} </th>
                                </tr>
                                </tfoot>

                            </table>
                        </div>
                    </div>
                </div>


                {{-- Receipts Report --}}
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h5 class="m-0 font-weight-bold text-primary">Receipts Report From <strong>{{ $start_date }}</strong> to <strong>{{ $end_date }}</strong> </h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-borderless table-sm" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Phone</th>
                                    <th class="text-right">Amount</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach ($receipts as $receipt)
                                    <tr>
                                        <td> {{ $receipt->name }} </td>
                                        <td> {{ $receipt->phone }} </td>
                                        <td class="text-right"> {{ number_format($receipt->amount, 2) }} </td>
                                    </tr>
                                @endforeach
                                </tbody>

                                <tfoot>
                                <tr>
                                    <th colspan="2" class="text-right">Total:</th>
                                    <th class="text-right"> {{ number_format($receipts->sum('amount'), 2) }} </th>
                                </tr>
                                </tfoot>

                            </table>
                        </div>
                    </div>
                </div>


                {{-- Reports for payments --}}
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h5 class="m-0 font-weight-bold text-primary">Payments Report From <strong>{{ $start_date }}</strong> to <strong>{{ $end_date }}</strong> </h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-borderless table-sm" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Phone</th>
                                    <th class="text-right">Amount</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach ($payments as $payment)
                                    <tr>
                                        <td> {{ $payment->name }} </td>
                                        <td> {{ $payment->phone }} </td>
                                        <td class="text-right"> {{ number_format($payment->amount, 2) }} </td>
                                    </tr>
                                @endforeach
                                </tbody>

                                <tfoot>
                                <tr>
                                    <th colspan="2" class="text-right">Total:</th>
                                    <th class="text-right"> {{ number_format($payments->sum('amount'), 2) }} </th>
                                </tr>
                                </tfoot>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
