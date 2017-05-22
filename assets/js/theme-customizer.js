(function($) {
    custom_color.forEach(function(value, key) {
        wp.customize('nf_customize_setting_' + key, function(data) {
            data.bind(function(to) {
                $(value.customize_color_element).css(value.customize_color_attribute, to);
            });
        });
    })
}(jQuery));
 