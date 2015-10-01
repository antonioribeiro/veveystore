jQuery('.delete-button').click(function(event)
{
    yes = "{{'captions.delete'}}";
    no = "{{'captions.cancel'}}";

    question = jQuery(this).data('question');
    formId = jQuery(this).data('form-id');
    formMethod = jQuery(this).data('form-method');
    formAction = jQuery(this).data('form-action');

    jQuery.SmartMessageBox({
        title : question,
        buttons : '['+yes+']['+no+']'
    }, function(ButtonPress, Value) {
        if (ButtonPress == yes)
        {
            if (typeof formAction != 'undefined')
            {
                jQuery('#'+formId).attr("action", formAction);
            }

            if (typeof formMethod != 'undefined')
            {
                if (formMethod.toUpperCase() == 'POST' || formMethod.toUpperCase() == 'GET')
                {
                    jQuery('#'+formId).attr("method", formMethod);
                }
                else
                {
                    form = jQuery('#'+formId);

                    form.find([name="_method"]).remove();

                    jQuery('<input name="_method" type="hidden" value="'+formMethod+'">').appendTo(form);
                }
            }

            jQuery('#'+formId).submit();
        }
    });
});
