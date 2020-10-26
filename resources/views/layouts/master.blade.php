@extends('layouts.app')
<div class="dashboard-main-wrapper">
@include('includes.navbar')
@include('includes.leftbar')

 <div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
        
           @yield('breadcrumb')
           @yield('main_content')
          
    </div>   
</div>
   


