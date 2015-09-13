@extends('emails.layout')

@section('email-title', $app_name_caps . ' - ' . t('titles.password-updated'))

@section('email-heading', t('titles.password-updated'))

@section('email-body')
	{{'paragraphs.your-password-was-updated'}}.
@stop
