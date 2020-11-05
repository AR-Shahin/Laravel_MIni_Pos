@extends('layouts.app')
<div class="dashboard-main-wrapper">
@include('includes.navbar')
@include('includes.leftbar')

 <div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
           @if(session('message'))
           <div class="alert alert-{{ session('type') }} alert-dismissible fade show" role="alert">
              {{ session('message') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           @endif
           @if ($errors->any())
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif
           @yield('main_content')
          
    </div>   
</div>
   


