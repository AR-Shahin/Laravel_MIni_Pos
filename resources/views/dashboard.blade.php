@extends('layouts.master')
@section('title', 'Dashboard')
@section('main_content')
    <div class="row">
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
            <div class="card border-3 border-top border-top-primary">
                <div class="card-body">
                    <h5 class="text-muted">Total Stock </h5>
                    <div class="">
                        <h1 class="mb-0"><i class="fa fa-bars mr-1"></i> {{ $totalStock }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
            <div class="card border-3 border-top border-top-primary">
                <div class="card-body">
                    <h5 class="text-primary">Total Products  </h5>
                    <div class="">
                        <h1 class="mb-0"><i class="fas fa-fw fa-th mr-1"></i>{{ $TotalProducts }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
            <div class="card border-3 border-top border-top-primary">
                <div class="card-body">
                    <h5 class="text-info">Total Sales  </h5>
                    <div class="">
                        <h1 class="mb-0">$ {{ $totalSales }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
            <div class="card border-3 border-top border-top-primary">
                <div class="card-body">
                    <h5 class="text-muted">Total Purchases  </h5>
                    <div class="">
                        <h1 class="mb-0">$ {{ $totalPurchases }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
            <div class="card border-3 border-top border-top-primary">
                <div class="card-body">
                    <h5 class="text-muted">Total Users  </h5>
                    <div class="">
                        <h1 class="mb-0"><i class="fa fa-users mr-1"></i> {{$TotalUsers}}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
            <div class="card border-3 border-top border-top-primary">
                <div class="card-body">
                    <h5 class="text-muted">Total Receipts  </h5>
                    <div class="">
                        <h1 class="mb-0"> ${{$totalReceipts}}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
            <div class="card border-3 border-top border-top-primary">
                <div class="card-body">
                    <h5 class="text-muted">Total Payments  </h5>
                    <div class="">
                        <h1 class="mb-0">$ {{ $totalPayments }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
            <div class="card border-3 border-top border-top-primary">
                <div class="card-body">
                    <h5 class="text-muted">Cash In Hand  </h5>
                    <div class="">
                        <h1 class="mb-0"> $ {{ $cashInHand = $totalReceipts - $totalPayments }}</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
            <div class="card border-3 border-top border-top-primary">
                <div class="card-body">
                    <h5 class="text-muted">Total Profit By Sell </h5>
                    <div class="">
                        <h1 class="mb-0"> $ {{ $totalProfits }}</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
            <div class="card border-3 border-top border-top-primary">
                <div class="card-body">
                    <h5 class="text-muted">Total Due </h5>
                    <div class="">
                        <h1 class="mb-0"> $ {{ $totalDue }}</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
            <div class="card border-3 border-top border-top-primary">
                <div class="card-body">
                    <h5 class="text-muted">Total Receivable </h5>
                    <div class="">
                        <h1 class="mb-0"> $ {{ $totalReceible }}</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
            <div class="card border-3 border-top border-top-primary">
                <div class="card-body">
                    <h5 class="text-muted">Total Expense </h5>
                    <div class="">
                        <h1 class="mb-0"> $ {{ $totalProfits -  $cashInHand }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection