<?php

namespace App\Customize;

use WP_Customize_Color_Control;

class Customize
{
    const NF_CUSTOMIZE_OPTION_KEY = 'nightfury_customize_option_key';

    public $colors;

    public function __construct()
    {
        add_action('customize_register', [$this, 'themeCustomize']);
        add_action('wp_head', [$this, 'applyStyle']);
        $colors = get_option(self::NF_CUSTOMIZE_OPTION_KEY, false);
        $this->colors = is_array($colors) ? $colors : [];
    }

    public function themeCustomize($wp_customize)
    {
        foreach ($this->colors as $key => $value) {
            $wp_customize->add_setting(
                "nf_customize_setting_{$key}",
                [
                    'default'   => $value['customize_color_default'],
                    'transport' => 'postMessage',
                ]
            );
            $wp_customize->add_control(
                new WP_Customize_Color_Control(
                    $wp_customize,
                    'link_color',
                    array(
                        'label'    => __($value['customize_color_title'], 'NF'),
                        'section'  => 'colors',
                        'settings' => "nf_customize_setting_{$key}",
                    )
                )
            );
        }
    }

    public function applyStyle()
    {
        $style = '<style>';
        foreach ($this->colors as $key => $value) {
            $style .= $value['customize_color_element'] . '{' . $value['customize_color_attribute'] . ': ' . get_theme_mod("nf_customize_setting_{$key}", $value['customize_color_default']) . '}';
        }
        $style .= '</style>';
        echo $style;
    }
}
