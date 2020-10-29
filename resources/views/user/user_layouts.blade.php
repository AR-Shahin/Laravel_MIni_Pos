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

			<button type="button" class="btn btn-info" data-toggle="modal" data-target="#newPayment">
			  <i class="fa fa-plus"></i> New Payment
			</button>

			<button type="button" class="btn btn-info" data-toggle="modal" data-target="#newPurchase">
			  <i class="fa fa-plus"></i> New Purchase
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
        <a class="nav-link " href="">Reports</a>
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

