// ----------------------------------------------------
// ------ Inbox

var ReactEventsPendingAuthorization = React.createClass(
{
    getInitialState: function()
    {
        return { events: [] };
    },

    update: function(event)
    {
        var success = function(data)
        {
            this.setState({ events: data.events });
        }.bind(this);

        return ajaxCall("{{ route('dashboard.events.pending.authorization') }}", this, success);
    },

    componentDidMount: function()
    {
        this.update();

        EventSystem.listen('update.dashboard', this.update);
    },

    render: function()
    {
        var events = [];

        if (this.state.events)
        {
            for (var i = 0; i < this.state.events.length; i++)
            {
                events.push(<ReactEventPendingAuthorization event={ this.state.events[i] } />);
            }

            return (
                <div className="well well-sm bg-color-red txt-color-white" id="event-container">
                    <legend className="txt-color-white">
                        {{t('captions.requiring-your-authorization')}}
                    </legend>

                    { events }
                </div>
            );
        }

        return <div></div>;
    }
});

var ReactEventPendingAuthorization = React.createClass(
{
    _authorize: function()
    {
        ajaxCall("{{ route('events.authorize') }}" + '/' + this.props.event.id, this);
    },

    _deny: function()
    {
        ajaxCall("{{ route('events.deny') }}" + '/' + this.props.event.id, this);
    },

    render: function()
    {
        return (
            <div key={this.props.event.id} className="well txt-color-red">
                <h3>
                    <a href={ this.props.event.roomUrl }>
                        { this.props.event.roomFullName }
                    </a>
                </h3>

                <strong>{ this.props.event.userFullName }</strong><br/>

                { this.props.event.weekdayName + ' / ' + this.props.event.fromTimeToTime }<br/>

                <br/>

                <div className="text-right">
                    <button type="button" className="btn btn-success" id="add-address-save-button" onClick={this._authorize}>
                        {{'captions.authorize'}}
                    </button>
                    &nbsp;
                    <button type="button" className="btn btn-danger" id="add-address-save-button" onClick={this._deny}>
                        {{'captions.deny'}}
                    </button>
                </div>
            </div>
        );
    },

});

