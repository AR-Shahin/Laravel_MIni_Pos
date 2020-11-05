@extends('user.user_layouts')
@section('title', 'Single User Info')

@section('user_content')
    <div class="card">
        <div class="card-body">
            <div class="row justify-content-center">

                <div class="col-12">
                    <h3>Receipt of <b>{{ $user->name}}</b></h3>
                    <hr>

                    <div class="table-responsive">
                        <table id="example3" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th>Customer Name</th>
                                <th>Admin Name</th>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Note</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($user->receipts as $receipt)
                                <tr>
                                    <td>{{ $user->name}}</td>
                                    <td>{{ $user->admin->name}}</td>
                                    <td>{{ $receipt->date}}</td>
                                    <td>{{ $receipt->amount}}</td>
                                    <td>{{ $receipt->note}}</td>
                                    <td class="text-center">
                                        <form method="POST" action="{{ route('user.receipts.destroy', ['id' => $user->id, 'receipt_id' => $receipt->id]) }}" style="display:inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th></th>
                                <th colspan="2">Total</th>
                                <th colspan="3" >{{ $user->receipts->sum('amount') }}</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection