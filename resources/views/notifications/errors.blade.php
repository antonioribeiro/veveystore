<?php

	$errors = Session::get('errors')->getBag('default')->all();
	$status = [];

	if (Session::get('error'))
	{
		$errors[] = Session::get('error');
	}

	if (Session::get('status'))
	{
		$info[] = Session::get('status');
	}

?>

@foreach($errors as $message)
    @include(
        'notifications.message',
        [
            'kind' => 'error',
            'icon' => 'error',
            'title' => ucfirst(t('paragraphs.error')),
            'message' => $message,
        ]
    )
@endforeach

@foreach($status as $message)
    @include(
        'notifications.message',
        [
            'kind' => 'error',
            'icon' => 'info',
            'title' => ucfirst(t('paragraphs.status')),
            'message' => $message,
        ]
    )
@endforeach
