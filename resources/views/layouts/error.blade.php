@extends('layouts.simple')

@section('contents')
    <div class="row">
        <div class="span8 offset2">
            <div class="member-box">
                @yield('message')
            </div>
        </div>
    </div>
@stop
