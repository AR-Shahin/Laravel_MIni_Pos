@extends('user.user_layouts')
@section('title', 'Single User Info')

@section('user_content')

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
                        <h1 class="mb-0">${{number_format($receipts->sum('total'),2)}}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
            <div class="card border-3 border-top border-top-primary">
                <div class="card-body">
                    <h5 class="text-muted">Total Payments  </h5>
                    <div class="">
                        <h1 class="mb-0">${{number_format($payments->sum('total'),2)}}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--sales report--}}
    <div class="card">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h3 class="text-primary">Sales Report<b></b></h3>
                    <div class="table-responsive">
                        <table  class="table table-striped table-borderless" style="width:100%">
                            <thead>
                            <tr>
                                <th>Products</th>
                                <th>Quantity</th>
                                <th class="text-right">Price</th>
                                <th class="text-right">Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sales as $sale)
                                <tr>
                                    <td>{{$sale->title}}</td>
                                    <td>{{$sale->quantity}}</td>
                                    <td class="text-right">${{$sale->price}}</td>
                                    <td class="text-right">${{$sale->total}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <td class="text-right">Total items : </td>
                                <td>{{$sales->sum('quantity')}}</td>
                                <td class="text-right">Total : </td>
                                <td class="text-right">${{$sales->sum('total')}}</td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--purchase report--}}
    <div class="card">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h3 class="text-primary">Purchases Report<b></b></h3>
                    <div class="table-responsive">
                        <table class="table table-striped table-borderless" style="width:100%">
                            <thead>
                            <tr>
                                <th>Products</th>
                                <th>Quantity</th>
                                <th class="text-right">Price</th>
                                <th class="text-right">Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($purchases as $purchase)
                                <tr>
                                    <td>{{$purchase->title}}</td>
                                    <td>{{$purchase->quantity}}</td>
                                    <td class="text-right">${{$purchase->price}}</td>
                                    <td class="text-right">${{$purchase->total}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <td class="text-right">Total items : </td>
                                <td>{{$purchases->sum('quantity')}}</td>
                                <td class="text-right">Total : </td>
                                <td class="text-right">${{$purchases->sum('total')}}</td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--receipts report--}}
    <div class="card">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h3 class="text-primary">Receipts Report<b></b></h3>
                    <div class="table-responsive">
                        <table class="table table-striped table-borderless" style="width:100%">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th class="text-right">Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($receipts as $receipt)
                                <tr>
                                    <td>{{$receipt->date}}</td>
                                    <td class="text-right">${{$receipt->total}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <td class="text-right">Total : </td>
                                <td class="text-right">${{$receipts->sum('total')}}</td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--Payments report--}}
    <div class="card">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h3 class="text-primary">Payments Report<b></b></h3>
                    <div class="table-responsive">
                        <table class="table table-striped table-borderless" style="width:100%">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th class="text-right">Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($payments as $payment)
                                <tr>
                                    <td>{{$payment->date}}</td>
                                    <td class="text-right">${{$payment->total}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <td class="text-right">Total : </td>
                                <td class="text-right">${{$payments->sum('total')}}</td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection