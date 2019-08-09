<?php
/**
 * Created by IntelliJ IDEA.
 * User: omarl
 * Date: 02.05.2019
 * Time: 15:38
 */
?>
    <!DOCTYPE html>
<html>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}"
    <link rel="stylesheet" href="{{asset('css/app.css')}}" media="all">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-compatible" content="IE=edge">
    <meta name="viewport" content="width-device-width, initial-scale =1">
    <title>PGM</title>
</head>

<body>
@include('inc.navbar')
    @yield('content')
    @include('inc.errorsuccess')
<script src="{{asset('js/app.js')}}"></script>
</body>

</html>
