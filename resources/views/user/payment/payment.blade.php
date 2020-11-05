@extends('user.user_layouts')
@section('title', 'Single User Info')
@section('user_content')
<div class="card">
    <div class="card-body">
        <div class="row justify-content-center">

            <div class="col-12">
                <h3>Payment of <b>{{ $user->name}}</b></h3>
                <hr>
              
              <div class="table-responsive">
                    <table id="example3" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>

                                <th>Customer Name</th>
                                <th>Admin Name</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Note</th>
                                <th>Total</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                    <tbody>
                        
                    @foreach($user->payments as $payment)
                           <tr>
                      
                        <td>{{ $user->name}}</td>
                        <td>{{ $user->admin->name}}</td>
                        <td class="text-center">{{ $payment->amount}}</td>
                        <td>{{ $payment->date}}</td>
                        <td>{{ $payment->note}}</td>
                        <td>{{ $payment->amount}}</td>
                        <td class="text-center">
                            <form method="POST" action="{{ route('user.payments.destroy', ['id' => $user->id, 'payment_id' => $payment->id]) }}" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i></button>
                        </td>
                        </tr>
                    @endforeach
                    <tfoot>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th colspan="2">Total</th>
                            <th colspan="2" >{{ $user->payments->sum('amount') }}</th>
                        </tr>
                    </tfoot>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection