@extends('user.user_layouts')
@section('title', 'Single User Info')

@section('user_content')
    <div class="card">
        <div class="card-body">
            <div class="row justify-content-center">

                <div class="col-12">
                    <h3>Sales of <b>{{ $user->name}}</b></h3>
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
                            @foreach($user->sales as $sale)
                                <tr>
                                    <td>{{ $sale->challan_no}}</td>
                                    <td>{{ $user->name}}</td>
                                    <td>{{ $user->admin->name}}</td>
                                    <td>{{ $sale->date}}</td>
                                    <td>{{ $sale->note}}</td>
                                    <td class="text-center">
                                        {{ $sale->items->sum('quantity')}}
                                        @php
                                            $grandQuantity+=$sale->items->sum('quantity');
                                        @endphp
                                    </td>
                                    <td class="text-center">
                                        $ {{ $sale->items->sum('total')}}
                                        @php
                                            $grandTotal+=$sale->items->sum('total');
                                        @endphp
                                    </td>
                                    <td class="text-center">{{-- invoice and sale id same --}}
                                        <a class="btn btn-primary btn-sm" href="{{ route('user.sales.invoice_details', ['id' => $user->id, 'invoice_id' => $sale->id]) }}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        @if($grandQuantity == 0)
                                            <form method="POST" action=" {{ route('user.sales.destroy', ['id' => $user->id, 'invoice_id' => $sale->id ]) }} " style="display:inline-block">
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
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>Total</th>
                                <th class="text-center">{{ $grandQuantity}}</th>
                                <th class="text-center">${{$grandTotal}}</th>
                                <th></th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection