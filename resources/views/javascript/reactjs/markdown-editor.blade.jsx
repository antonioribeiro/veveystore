var MarkdownEditor = React.createClass(
{
    getInitialState: function()
    {
        return {
            value: 'Hello!'
        };
    },

    componentDidMount: function()
    {
        autosize(document.querySelectorAll('textarea'));
    },

    _handleChange: function(event)
    {
        this.setState({
            value: event.target.value
        });

        EventSystem.fire('markdown.editor.changed', { value: event.target.value });
    },

    render: function() {
        return <div>
                <textarea
                    className="form-control"
                    rows="3"
                    name={this.props.name}
                    onChange={this._handleChange}>
                </textarea>
        </div>;
    }
});


