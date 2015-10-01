var transitionToNewContent = function(container, new_content)
{
    container.fadeOut(500, function()
    {
        jQuery(this).empty().append(new_content).fadeIn(300);
    });
};

function validationObserver(formSelector, buttonSelector, messagesSelector)
{
    var form = jQuery(formSelector);

    form.validate();

    console.log(form);

    jQuery(buttonSelector).click(function()
    {
        if (form.valid())
        {
            validateFormOnServer(formSelector, messagesSelector);
        }
    });
}

function validateFormOnServer(formSelector, messagesSelector)
{
    var href = jQuery(formSelector).attr('action') + '/validate';

    var summernote = jQuery('.summernote');

    if (summernote.length)
    {
        summernote.val(summernote.code());
    }

    success = jQuery.post(href, jQuery(formSelector).serialize())
    .done(function(data)
    {
        jQuery(formSelector).submit();
    })
    .fail(function(data) {
        displayErrorMessages(data, messagesSelector);
    });
}

function displayErrorMessages(data, messagesSelector)
{
    newContent = '';

    jQuery.each(data.responseJSON, function(entry)
    {
        message = data.responseJSON[entry];

        newContent += '<div class="alert alert-danger fade in"><button class="close" data-dismiss="alert">	×</button><i class="fa-fw fa fa-times"></i> '+message+'</div>';
    });

    transitionToNewContent(jQuery(messagesSelector), newContent);

    dismissable = jQuery('a[dismissable]');

    dismissable.unbind('click');

    dismissable.click(function(evnt)
    {
        jQuery(this).hide('fast');
    });

    jQuery("html, body").animate({ scrollTop: 0 }, "slow");
}
