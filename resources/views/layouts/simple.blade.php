@extends('templates.686.layout')

@section('main-container')
    @include('home.top-menu')

    <!-- Header -->

    <div class="row">
        @include('home.logo')
    </div>

    @include('notifications.flash')

    @yield('contents')

    @include('home.footer')
@stop
