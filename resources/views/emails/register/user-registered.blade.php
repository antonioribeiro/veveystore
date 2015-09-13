@extends('emails.layout')

@section('email-title', $app_name_caps . ' - ' . t('titles.activate-your-account'))

@section('email-heading', t('titles.activate-your-account'))

@section('email-body')

	To activate your account, please click the link below:<br>
	<br>
	{!! URL::route('account.activate', ['email' => $user->email, 'token' => $user->getActivateAccountToken()]) !!}.

@stop
