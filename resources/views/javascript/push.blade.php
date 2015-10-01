<script src="//js.pusher.com/2.2/pusher.min.js" type="text/javascript"></script>

<script type="text/javascript">
    @if ($current_user)
        // Enable pusher logging - don't include this in production
        Pusher.log = function(message)
        {
            if (window.console && window.console.log)
            {
                window.console.log(message);
            }
        };

        var pusher = new Pusher('{{ env('PUSH.PUBLIC') }}');


        // Push notifications for INBOX
        var channel = pusher.subscribe('-USER-{{$current_user->id}}-CHANNEL-inbox');

        channel.bind('new.message', function(data)
        {
            EventSystem.fire('reload.folders');
        });


        // Push notifications for DASHBOARD
        var channel = pusher.subscribe('-USER-{{$current_user->id}}-CHANNEL-event');

        channel.bind('event.changed', function(data)
        {
            EventSystem.fire('update.dashboard');

            var url = '{{ $events_url or $default_events_url }}';

            if (data.url)
            {
                url = data.url;
            }

            updateFullCalendar('#calendar', url);
        });
    @endif
</script>
