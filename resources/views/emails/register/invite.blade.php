@extends('emails.layout')

@section('email-title', $app_name_caps . ' - ' . t('titles.join-us'))

@section('email-heading', t('titles.join-us'))

@section('email-body')

	Este é um convite para entrar no {{ $app_name_caps }}, para aceitar, por favor clique no link abaixo:<br>
	<br>
	{!! URL::route('connect.invite.accept', ['id' => $user->id]) !!}.

@stop
