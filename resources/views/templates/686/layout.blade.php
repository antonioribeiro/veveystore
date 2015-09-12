@extends('layouts.html')

@section('head')
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="UTF-8" />

    <!-- Bootstrap -->
    <link href="templates/686project.com/assets/css/bootstrap.min.css" rel="stylesheet" media="screen" />

    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet" type="text/css" />
    <link href="templates/686project.com/assets/css/entypo.css" rel="stylesheet" type="text/css" />

    <!-- Template CSS -->
    <link href="templates/686project.com/assets/css/686tees.css" rel="stylesheet" type="text/css" />
@stop

@section('body')
    <div class="container">
        @yield('main-container')
    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="templates/686project.com/assets/js/bootstrap.min.js"></script>

@stop
