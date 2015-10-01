@extends('admin.layouts.master')

@section('body.contents')
    @include('notifications.flash')

    <div id="wrapper">
        @include('admin.partials.menu')

        <div id="page-wrapper">
            @yield('container')
        </div><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->
@stop
