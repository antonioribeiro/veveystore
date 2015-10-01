var Select = React.createClass(
{
    getInitialState: function()
    {
        return {
            items: []
        };
    },

    componentDidMount: function()
    {
        this._loadSelect();
        this._showOther(false);
    },

    _loadSelect: function ()
    {
        var first = this.props.first != undefined ? this.props.first : '';
        var last = this.props.last != undefined ? this.props.last : '';

        jQuery.ajax(
        {
            type: "GET",

            url: '{{ route("api.select.allFrom") }}/' + this.props.model + '/' + first + '/' + last,

            success: function(response)
            {
                this.setState({
                    items: response.items
                });
            }.bind(this)
        });
    },

    _change: function(event)
    {
        var show = false;

        if (event.target.value == 9999)
        {
            show = true;
        }

        this._showOther(show);
    },

    _showOther: function (show)
    {
        if (this.props.otherSelector)
        {
            if (show)
            {
                jQuery(this.props.otherSelector).show();
            }
            else
            {
                jQuery(this.props.otherSelector).hide();
            }
        }
    },

    _makeOption: function (index, value)
    {
        //console.log(index);
        //console.log(value);
        return (<option value={index}>{value}</option>);
    },

    render: function()
    {
        var items = this.state.items;

        var optionNodes = Object.keys(items).map(function(value, index)
        {
            return this._makeOption(value, items[value]);
        }.bind(this));

        if (this.props.first)
        {
            optionNodes.unshift(this._makeOption('', this.props.first));
        }

        if (this.props.last)
        {
            optionNodes.push(this._makeOption(9999, this.props.last));
        }

        return (
            <div>
                <select name={this.props.name} className="form-control" onChange={this._change}>
                    { optionNodes }
                </select>
            </div>
        );
    }
});
