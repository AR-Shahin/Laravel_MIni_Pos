@extends('layouts.master')
@section('css_files')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/vendor/datatables/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/vendor/datatables/css/buttons.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/vendor/datatables/css/select.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/vendor/datatables/css/fixedHeader.bootstrap4.css">
@endsection
@section('main_content')
    @yield('user_card')
    <div class="row">
        <div class="col-4">
            <a href="{{ url('users')}}" class="btn btn-info"><i class="fa fa-arrow-left mr-1" aria-hidden="true"></i> Back</a>
        </div>
        <div class="col-md-8 text-right">
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#newSale">
                <i class="fa fa-plus"></i> New Sale
            </button>

            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#newPurchase">
                <i class="fa fa-plus"></i> New Purchase
            </button>

            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#newPayment">
                <i class="fa fa-plus"></i> New Payment
            </button>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#newReceipt">
                <i class="fa fa-plus"></i> New Receipt
            </button>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-2">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link @if($tab_menu == 'user_info') active @endif " href="{{ route('users.show', $user->id) }}">User Info</a>
                <a class="nav-link @if($tab_menu == 'reports') active @endif" href="{{ route('user.reports',$user->id)}}">Reports</a>
                <a class="nav-link @if($tab_menu == 'sales') active @endif" href="{{ route('user.sales',$user->id)}}">Sales</a>

                <a class="nav-link  @if($tab_menu == 'purchase') active @endif" href="{{ route('user.purchase', $user->id) }}">Purchases</a>
                <a class="nav-link @if($tab_menu == 'payment') active @endif" href="{{ route('user.payment', $user->id) }}">Payments</a>
                <a class="nav-link @if($tab_menu == 'receipt') active @endif" href="{{ route('user.receipt', $user->id) }}">Receipts</a>
            </div>
        </div>
        <div class="col-md-10">
            @yield('user_content')
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets') }}/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('assets') }}/vendor/datatables/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('assets') }}/vendor/datatables/js/data-table.js"></script>
@endsection


<!-- New Payments Modal  -->
<div class="modal fade" id="newPayment" tabindex="-1" role="dialog" aria-labelledby="newPayment" aria-hidden="true">
    <form action="{{ route('user.payment.store',$user->id)  }}" method="POST">
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">New Payments </h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="date">Date <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-9">
                                <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" id = "date" value="{{ old('date')}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="amount">Amount <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-9">
                                <input type="text" class="form-control @error('amount') is-invalid @enderror" name="amount" id = "amount" value="{{ old('amount')}}" placeholder="Amount">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="amount">Note <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-9">
                                <textarea name="note" id="" cols="30" rows="3" class="form-control @error('note') is-invalid @enderror"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- New Receipt Modal  -->
<div class="modal fade" id="newReceipt" tabindex="-1" role="dialog" aria-labelledby="newReceipt" aria-hidden="true">
    <form action="{{ route('user.receipt.store',$user->id)  }}" method="POST">
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">New Receipt </h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="date">Date <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-9">
                                <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" id = "date" value="{{ old('date')}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="amount">Amount <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-9">
                                <input type="text" class="form-control @error('amount') is-invalid @enderror" name="amount" id = "amount" value="{{ old('amount')}}" placeholder="Amount">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="amount">Note <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-9">
                                <textarea name="note" id="" cols="30" rows="3" class="form-control @error('note') is-invalid @enderror"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>


<!-- New sale Modal  -->
<div class="modal fade" id="newSale" tabindex="-1" role="dialog" aria-labelledby="newSale" aria-hidden="true">
    <form action="{{ route('user.sales.store',$user->id)  }}" method="POST">
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">New Sale </h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="date">Date <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-9">
                                <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" id = "date" value="{{ old('date')}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="challan_no">Challan No" <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-9">
                                <input type="text" class="form-control @error('challan_no') is-invalid @enderror" name="challan_no" id = "challan_no" value="{{ old('challan_no')}}" placeholder="Challan No">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="amount">Note <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-9">
                                <textarea name="note" id="" cols="30" rows="3" class="form-control @error('note') is-invalid @enderror"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>


<!-- New Purchase Modal  -->
<div class="modal fade" id="newPurchase" tabindex="-1" role="dialog" aria-labelledby="newSale" aria-hidden="true">
    <form action="{{ route('user.purchase.store',$user->id)  }}" method="POST">
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">New Purchase </h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="date">Date <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-9">
                                <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" id = "date" value="{{ old('date')}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="challan_no">Challan No" <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-9">
                                <input type="text" class="form-control @error('challan_no') is-invalid @enderror" name="challan_no" id = "challan_no" value="{{ old('challan_no')}}" placeholder="Challan No">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="amount">Note <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-9">
                                <textarea name="note" id="" cols="30" rows="3" class="form-control @error('note') is-invalid @enderror"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>

