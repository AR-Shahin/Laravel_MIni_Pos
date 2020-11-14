<!doctype html>
<html lang="en">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title','Mini-POS') | POS</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/bootstrap/css/bootstrap.min.css">
    <link href="{{ asset('assets') }}/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets') }}/libs/css/style.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/fonts/fontawesome/css/fontawesome-all.css">
    @yield('css_files')
</head>

<body>
<div class="container">
    @if(session('front_message'))
        <div class="alert alert-{{ session('type') }} alert-dismissible fade show" role="alert">
            {{ session('front_message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
</div>
@yield('main_section')


<!-- Optional JavaScript -->
<script src="{{ asset('assets') }}/vendor/jquery/jquery-3.3.1.min.js"></script>
<script src="{{ asset('assets') }}/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<script src="{{ asset('assets') }}/vendor/slimscroll/jquery.slimscroll.js"></script>
<script src="{{ asset('assets') }}/libs/js/main-js.js"></script>
@yield('scripts')
</body>

</html>

