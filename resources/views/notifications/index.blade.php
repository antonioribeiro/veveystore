@extends('layouts.simple')

@section('contents')
    <div class="row">
        <div class="span1"></div>
        <div class="span10">
            <div class="member-box">
                @include('notifications.notification-body')
            </div>
        </div>
    </div>
@stop
