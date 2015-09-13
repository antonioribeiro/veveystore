@extends('emails.layout')

@section('email-title', $app_name_caps . ' - ' . t('paragraphs.authorize-two-factor-email'))

@section('email-heading', t('paragraphs.authorize-two-factor-email'))

@section('email-body')

	Here is your code: {{ $user->two_factor_email_secret_key }}<br>

@stop
