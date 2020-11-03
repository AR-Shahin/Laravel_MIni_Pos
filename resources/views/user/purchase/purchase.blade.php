@extends('user.user_layouts')
@section('title', 'Single User Info')

@section('breadcrumb')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Users</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Single User Purchase Info</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('user_content')
    <div class="card">
        <div class="card-body">
            <div class="row justify-content-center">

                <div class="col-12">
                    <h3>Purchases of  <b>{{ $user->name}}</b></h3>
                    <hr>

                    <div class="table-responsive">
                        <table id="example3" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th>Challan No</th>
                                <th>Customer Name</th>
                                <th>Admin Name</th>
                                <th>Date</th>
                                <th>Note</th>
                                <th>Items</th>
                                <th>Total</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $grandTotal = 0;
                                $grandQuantity = 0;
                            @endphp
                            @foreach($user->purchases as $purchase)
                                <tr>
                                    <td>{{ $purchase->challan_no}}</td>
                                    <td>{{ $user->name}}</td>
                                    <td>{{ $user->admin->name}}</td>
                                    <td>{{ $purchase->date}}</td>
                                    <td>{{ $purchase->note}}</td>
                                    <td class="text-center">{{ $purchase->items()->sum('quantity') }}</td>
                                    @php
                                        $grandQuantity += $purchase->items()->sum('quantity');
                                    @endphp
                                    <td class="text-center">${{ $purchase->items()->sum('total') }}</td>
                                    @php
                                        $grandTotal += $purchase->items()->sum('total');
                                    @endphp
                                    <td class="text-center">
                                        <a class="btn btn-primary btn-sm" href="{{ route('user.purchase.invoice_details', ['id' => $user->id, 'invoice_id' => $purchase->id]) }}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        @if($grandQuantity == 0)
                                            <form method="POST" action=" {{ route('user.purchase.destroy',['id'=>$user->id,'invoice_id'=>$purchase->id]) }}" style="display:inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i></button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <th>Total</th>
                                <th class="text-center">{{ $grandQuantity }}</th>
                                <th class="text-center">
                                    $ {{ $grandTotal }}
                                </th>
                                <td></td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection