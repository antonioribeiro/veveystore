@foreach($messages = Flash::popMessages() as $kind => $message)
    @include(
        'notifications.message',
        [
            'kind' => $message['kind'],
            'icon' => $message['icon'],
            'title' => $message['title'],
            'message' => $message['message'],
        ]
    )
@endforeach
