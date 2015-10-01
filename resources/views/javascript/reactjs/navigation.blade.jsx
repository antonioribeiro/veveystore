// ----------------------------------------------------
// ------ Inbox

var ReactInboxNavigation = React.createClass(
{
    getInitialState: function()
    {
        return {unreadMessageCount: 0};
    },

    loaded: function(event)
    {
        var unread = 0;

        for (var key in event.messages)
        {
            if (event.messages.hasOwnProperty(key))
            {
                if (event.messages[key].unread)
                {
                    unread++;
                }
            }
        }

        this.setState({unreadMessageCount: unread});
    },

    componentDidMount: function()
    {
        EventSystem.listen('folders.loaded', this.loaded);
    },

    render: function()
    {
        count = this.state.unreadMessageCount ? this.state.unreadMessageCount : '';

        return (<span className="badge pull-right inbox-badge bg-color-red">{count}</span>);
    }
});


// ----------------------------------------------------
// ------ Dashboard

var ReactDashboardNavigation = React.createClass(
{
    getInitialState: function()
    {
        return {notificationsCount: 0};
    },

    update: function(event)
    {
        jQuery.ajax({
            url: "{{ route('dashboard.notifications') }}",

            dataType: 'json',

            success: function(data)
            {
                this.setState({notificationsCount: data.notificationsCount});
            }.bind(this),

            error: function(xhr, status, err)
            {
                console.error(xhr, status, err.toString());
            }.bind(this)
        });
    },

    componentDidMount: function()
    {
        EventSystem.listen('update.dashboard', this.update);

        this.update();
    },

    render: function()
    {
        count = this.state.notificationsCount ? this.state.notificationsCount : '';

        return (<span className="badge pull-right inbox-badge bg-color-red">{count}</span>);
    }
});
