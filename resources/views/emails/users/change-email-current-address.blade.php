@extends('emails.layout')

@section('email-title', $app_name_caps . ' - ' . t('titles.activate-your-account'))

@section('email-heading', t('titles.activate-your-account'))

@section('email-body')

	If you requested to change your e-mail from {{$user->email}} to {{$email}}, please click the link below:<br>
	<br>
	{{ $link }}.<br>
	<br>
	If you did not do such request, please, report it by clicking this link: {{ $link }}.

@stop
