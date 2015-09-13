@extends('templates.686.layout')

@section('main-container')
    @include('home.top-menu')

    <!-- Header -->

    <div class="row">
        @include('home.logo')

        @include('home.cart')
    </div>

    @include('home.products-menu')

    @include('notifications.flash')

    @yield('contents')

    @include('home.footer')
@stop
