<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">


    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <title>Forum</title>
    <style>
        #brandLogo {
            font-weight: 600;
            color: orange;
        }
        .navbar-brand{
            font-size: 40px;
            letter-spacing: 5px;
        }
    </style>
</head>
<body>
<?php
if (Auth::user()->getTable() == 'teachers') {
    $url = 'teacher';
} elseif (Auth::user()->getTable() == 'students') {
    $url = 'student';
}
?>
<!-- Image and text -->
<nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand ml-5 text-center" href="{{ url( '/' . $url . '/forum') }}">
       <span id="brandLogo">F</span>o<span id="brandLogo">r</span>u<span id="brandLogo">m</span>
    </a>
    <a href="{{url( '/' . $url . '/dashboard')}}" class="pull-right pr-5">Leave Forum</a>
</nav>


<div class="container mt-5">

    @include('flash-message')
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @yield('content')
</div>


<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('js/demo.js') }}"></script>
<script>
    $(document).ready(function () {
        setTimeout(function() {
            $('.alert').fadeOut('fast');
        }, 3000);
    });
</script>
</body>
</html>
