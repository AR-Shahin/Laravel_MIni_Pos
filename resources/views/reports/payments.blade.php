@extends('layouts.master')
@section('title', 'Payment Report')
@section('main_content')
    <div class="row no-gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-4">
                            <h3 class="mb-0" style="display: inline-block">Payment Report</h3>
                        </div>
                        <div class="col-8">

                            <form action="{{route('reports.payments')}}" method="get">

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
                    <h4 class="text-primary">Payment Report From <b>{{$start_date}}</b> to <b>{{$end_date}}</b></h4>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-striped table-borderless" style="width:100%">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>User</th>
                                <th>Note</th>
                                <th>Amount</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($payments as $payment)
                                <tr>
                                    <td>{{$payment->date}}</td>
                                    <td>{{$payment->user->name}}</td>
                                    <td>{{$payment->note}}</td>
                                    <td>${{$payment->amount}}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <th>Total</th>
                                <td>${{$payments->sum('amount')}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
