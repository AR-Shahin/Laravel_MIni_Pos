@extends('layouts.master')
@section('title', 'Receipt Report')
@section('main_content')
    <div class="row no-gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-4">
                            <h3 class="mb-0" style="display: inline-block">Receipt Report</h3>
                        </div>
                        <div class="col-8">

                            <form action="{{route('reports.receipts')}}" method="get">

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
                    <h4 class="text-primary">Receipt Report From <b>{{$start_date}}</b> to <b>{{$end_date}}</b></h4>
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
                            @foreach($receipts as $receipt)
                                <tr>
                                    <td>{{$receipt->date}}</td>
                                    <td>{{$receipt->user->name}}</td>
                                    <td>{{$receipt->note}}</td>
                                    <td>${{$receipt->amount}}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <th>Total</th>
                                <td>${{$receipts->sum('amount')}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
