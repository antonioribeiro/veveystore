@extends('emails.layout')

@section('email-title', $app_name_caps . ' - ' . t('titles.reset-your-password'))

@section('email-heading', t('titles.reset-your-password'))

@section('email-body')
	{{'paragraphs.to-reset-your-password'}}: {!! URL::to('password/reset', [$token]) !!}.

	<br/><br/><br/>

	{{ t('paragraphs.this-link-will-expire', ['time' => Config::get('auth.reminder.expire', 60)]) }}
@stop
