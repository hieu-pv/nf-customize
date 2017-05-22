<?php

namespace App\Customize;

use App\Customize\Customize;

class Admin
{
    public $colors;
    public function __construct()
    {
        $colors       = get_option(Customize::NF_CUSTOMIZE_OPTION_KEY, false);
        $this->colors = is_array($colors) ? $colors : [];
        add_action('admin_menu', [$this, 'admin_page']);
        add_action('admin_post_nf_customize_add_entity', [$this, 'store']);
        add_action('admin_post_nf_customize_remove_entity', [$this, 'delete']);
        add_action('customize_preview_init', [$this, 'customizer_live_preview_variable']);
        add_action('customize_preview_init', [$this, 'addLivePreview']);
    }

    public function admin_page()
    {
        $colors = $this->colors;
        add_options_page('NF Customize', 'NF Customize', 'manage_options', 'nightfury-customize', function () use ($colors) {
            echo \App\View\Facade\View::render('admin', compact('colors'));
        });

    }

    public function store()
    {
        $request = \Illuminate\Http\Request::capture();
        array_push($this->colors, $request->only('customize_color_title', 'customize_color_default', 'customize_color_element', 'customize_color_attribute'));
        update_option(Customize::NF_CUSTOMIZE_OPTION_KEY, $this->colors, '', 'yes');
        wp_redirect(admin_url('options-general.php?page=nightfury-customize'));
    }

    public function delete()
    {
        $request = \Illuminate\Http\Request::capture();
        unset($this->colors[$request->get('key')]);
        update_option(Customize::NF_CUSTOMIZE_OPTION_KEY, $this->colors, '', 'yes');
        wp_redirect(admin_url('options-general.php?page=nightfury-customize'));
    }

    public function addLivePreview()
    {
        wp_enqueue_script(
            'nf-customizer',
            plugin_dir_url(__FILE__) . '../../assets/js/theme-customizer.js', //Point to file
            array('jquery', 'customize-preview'),
            '',
            true
        );

    }

    public function customizer_live_preview_variable()
    {
        $script = '<script>';
        $script .= 'var custom_color = ' . json_encode($this->colors) . ';';
        $script .= 'console.log(custom_color);';
        $script .= '</script>';
        echo $script;
    }

}
