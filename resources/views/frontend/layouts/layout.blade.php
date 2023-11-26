<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">
    <title>Face Mosque</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;400;700&display=swap" rel="stylesheet">

    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/bootstrap-icons.css')}}" rel="stylesheet">

    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/templatemo-festava-live.css')}}" rel="stylesheet">

    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"
          type='text/css'>
    <script src="https://kit.fontawesome.com/0fa54d043b.js" crossorigin="anonymous"></script>

    <!-- jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{asset('js/changevideo.js')}}" defer></script>
    <!-- Bootstrap JavaScript files -->
</head>
<body>
<main>
    @include('.frontend.includes.header')
    @yield('content')
</main>
@include('.frontend.includes.footer')
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/jquery.sticky.js')}}"></script>
<script src="{{asset('js/click-scroll.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>
<script src="{{asset('js/searchmosque.js')}}" defer></script>
<script src="{{asset('js/pages.js')}}"></script>
</body>
</html>
