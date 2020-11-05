@extends('user.user_layouts')
@section('title', 'Single User Info')
@section('user_card')
    <div class="row">
        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
            <div class="card border-3 border-top border-top-primary">
                <div class="card-body">
                    <h5 class="text-muted">Sales</h5>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1">$
                            <?php
                            $Sale = 0;
                            foreach ($user->sales as $sale){
                                $Sale+= $sale->items->sum('total');
                            }
                            echo $Sale;
                            ?>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
            <div class="card border-3 border-top border-top-primary">
                <div class="card-body">
                    <h5 class="text-muted">Purchases</h5>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1">$
                            <?php
                            $Purchases = 0;
                            foreach ($user->purchases as $purchase){
                                $Purchases+= $purchase->items->sum('total');
                            }
                            echo $Purchases;
                            ?>
                        </h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
            <div class="card border-3 border-top border-top-primary">
                <div class="card-body">
                    <h5 class="text-muted">Payments</h5>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1">${{$Payment = $user->payments()->sum('amount') }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
            <div class="card border-3 border-top border-top-primary">
                <div class="card-body">
                    <h5 class="text-muted">Receipts</h5>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1">${{$Receipt = $user->receipts->sum('amount') }}</h1>
                    </div>
                </div>
            </div>
        </div>
        @php
            $totalBalance = ($Purchases + $Receipt) - ($Sale + $Payment)
        @endphp
        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
            <div class="card border-3 border-top border-top-primary">
                <div class="card-body">
                    <h5 class="text-muted">Balance</h5>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1">$
                            @if($totalBalance>=0)
                                {{ $totalBalance}}
                            @else
                                0
                            @endif
                        </h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
            <div class="card border-3 border-top border-top-primary">
                <div class="card-body">
                    <h5 class="text-muted">Due</h5>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1">$
                            @if ($totalBalance < 0)
                                {{ $totalBalance }}
                            @else
                                0
                            @endif
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('user_content')
    <div class="card">
        <div class="card-body">
            <h3><b>{{$user->name}}'s</b> Information</h3>
            <hr>
            <table class="table table-striped table-bordered">
                <tbody>
                <tr>
                    <th>Group  </th>
                    <td>{{ ucwords($user->group->title)}}</td>
                </tr>
                <tr>
                    <th>Name  </th>
                    <td>{{ $user->name}}</td>
                </tr>
                <tr>
                    <th>Email  </th>
                    <td>{{ $user->email}}</td>
                </tr>
                <tr>
                    <th>Phone  </th>
                    <td>{{ $user->phone}}</td>
                </tr>
                <tr>
                    <th>Address  </th>
                    <td>{{ $user->address}}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection