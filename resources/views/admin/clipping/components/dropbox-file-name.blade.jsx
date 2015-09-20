var DropboxFileName = React.createClass(
{
    getInitialState: function()
    {
        return {
            filename: ''
        };
    },

    __changed: function()
    {
        this.__setTimer();
        
        jQuery.ajax(
        {
            type: "POST",

            url: '{{ route("api.clipping.makefilename") }}',

            data: jQuery('#create-clipping-form').serialize(),

            success: function(response)
            {
                this.setState({ filename: response.filename });
            }.bind(this)
        });
    },

    componentDidMount: function()
    {
        this.__setTimer();
    },

    __setTimer: function()
    {
        setTimeout(this.__changed, 1500);
    },

    render: function() {
        return (
            <div>
                <input type="text" value={this.state.filename} name="dropbox_filename" className="form-control" />
            </div>
        );
    }
});
