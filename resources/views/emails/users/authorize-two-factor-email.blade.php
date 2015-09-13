@extends('emails.layout')

@section('email-title', $app_name_caps . ' - ' . t('paragraphs.authorize-two-factor-email'))

@section('email-heading', t('paragraphs.authorize-two-factor-email'))

@section('email-body')

	A request to {{ $user->two_factor_email_enabled ? 'DISABLE' : 'ENABLE' }} was made from your account, to confirm, please, click the link below:<br>
	<br>
	{{ $link }}.<br>
	<br>

@stop
