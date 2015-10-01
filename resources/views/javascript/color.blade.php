// Find a contrasting color
//
function getContrastYIQ(hexcolor)
{
    var r = parseInt(hexcolor.substr(0,2),16);
    var g = parseInt(hexcolor.substr(2,2),16);
    var b = parseInt(hexcolor.substr(4,2),16);
    var yiq = ((r*299)+(g*587)+(b*114))/1000;
    return (yiq >= 128) ? 'black' : 'white';
}

// Change input color
//

jQuery.each(jQuery('.color-selector'), function(pos, element)
{
    jQuery(element).css('background-color',jQuery(element).val());
    jQuery(element).css('color', getContrastYIQ(jQuery(element).val().substring(1,10)));
});

// Color picker
//
jQuery('.color-selector').click(function()
{
    jQuery(this).colpick({
        layout:'hex',
        submit:0,
        onChange: function(hsb,hex,rgb,el,bySetColor) {
            $(el).css('background-color','#'+hex);
            $(el).css('color',getContrastYIQ(hex));
            // Fill the text box just if the color was set using the picker, and not the colpickSetColor function.
            if (!bySetColor) {
                $(el).val('#'+hex);
            }
        }
    });
});
