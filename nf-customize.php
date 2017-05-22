<?php

/*
Plugin Name: NF Customize
Plugin URI:  https://codersvn.com/plugins/nightfury-customize
Description: This plugin will help you create an accordion menu.
Version:     1.0.0
Author:      Night Fury
Author URI:  https://codersvn.com/plugins/nightfury-customize
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Domain Path: https://codersvn.com/plugins/nightfury-customize
Text Domain: https://codersvn.com/plugins/nightfury-customize
 */

require __DIR__ . '/vendor/autoload.php';

new \App\Customize\Customize;

if (is_admin()) {

    new \App\Customize\Admin;

}
