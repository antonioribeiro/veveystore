React.render(<MarkdownEditor name="body"/>, document.getElementById('post-body'));

React.render(<MarkdownPreview />, document.getElementById('post-body-preview'));

React.render(<Select
        name="editorial_id"
        model="editorial"
        first="{{ strtoupper(t('paragraphs.select-an-editorial')) }}"
        last="({{ strtolower(t('captions.other')) }})"
        otherSelector="#other-editorial-group"
        />
    , document.getElementById('editorial')
);

React.render(<Select
        name="vehicle_id"
        model="vehicle"
        first="{{ strtoupper(t('paragraphs.select-a-vehicle')) }}"
        last="({{ strtolower(t('captions.other')) }})"
        otherSelector="#other-vehicle-group"
        />
    , document.getElementById('vehicle')
);

React.render(<Select
        name="locality_id"
        model="locality"
        first="{{ strtoupper(t('paragraphs.select-a-locality')) }}"
        last="({{ strtolower(t('captions.other')) }})"
        otherSelector="#other-locality-group"
        />
    , document.getElementById('locality')
);

React.render(
    <DropboxFileName />
    , document.getElementById('react-dropbox-file-name')
);
