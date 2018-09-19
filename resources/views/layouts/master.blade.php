<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Post</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
</head>
<body class="bg-info">
           @include('partials.menu')

<div class="container">
    <div class="row">
        <div class="col-md-12">
        </div>
    </div>
    <div class="row">
    <div class="col-md-12">
        @yield('content')
    </div>
    </div>
    <div>
    </div>
</div>
     @include('partials.footer')

<script src="{{asset('js/app.js')}}"></script>
</body>
</html>

@include('flashy::message')