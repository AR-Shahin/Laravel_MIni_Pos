@extends('layouts.app')
@section('title', 'Admin Login')
@section('main_section')
<div class="splash-container mt-5 pt-5">
        <div class="card mt-5 py-5">
           	@if ($errors->any())
		    <div class="text-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
            <div class="card-header text-center"><a href="../index.html"><img class="logo-img" src="{{ asset('assets')}}/images/logo.png" alt="logo"></a><span class="splash-description">Please enter your user information.</span></div>
            <div class="card-body">
                <form action="{{ url('login')}}" method="post">
                @csrf
                    <div class="form-group">
                        <input class="form-control form-control-lg @error('email') is-invalid @enderror" id="username" type="text" placeholder="Email" autocomplete="off" name="email" value="{{old('email')}}">
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg @error('password') is-invalid @enderror" id="password" type="password" placeholder="Password" name="password">
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
                </form>
            </div>
        </div>
    </div>
@endsection