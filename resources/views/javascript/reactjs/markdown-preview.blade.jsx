var MarkdownPreview = React.createClass(
{
    _changed: function(data)
    {
        if ( ! data.value)
        {
            jQuery('.markdown-preview').code('');

            return;
        }

        jQuery.ajax(
        {
            type: "POST",

            url: '{{ route("api.markdown.tohtml") }}',

            data: { markdown: data.value },

            success: function(response)
            {
                jQuery('.markdown-preview').code(response.html);
            }.bind(this)
        });
    },

    componentDidMount: function()
    {
        jQuery('.markdown-preview').summernote(
        {
            airMode: true
        });

        EventSystem.listen('markdown.editor.changed', this._changed);
    },

    render: function() {
        return (
            <div>
                <div className="markdown-preview"></div>
            </div>
        );
    }
});

