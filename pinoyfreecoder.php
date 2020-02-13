<?php
/**
* @package PinoyFreeCoderPlugin
* @version 1.0.0
*/
/*
Plugin Name: PinoyFreeCoder Plugin
Plugin URI: https://www.pinoyfreecoder.com/
Description: This is a pinoyfreecoder wordpress plugin
Author: PinoyFreeCoder
Author URI: https://www.pinoyfreecoder.com/
Version: 1.0.0
License: GPLv2 or later
Text Domain: pinoyfreecoder-plugin
*/
/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

defined('ABSPATH') or die('You are not in wordpress directory.');

class PinoyFreeCoderPlugin
{

     function __construct(){
         add_action('init', array($this, 'custom_post_type'));
     }

     function register(){
         add_action('admin_enqueue_scripts', array($this, 'enqueue'));
     }

     function activate(){

        $this->custom_post_type();
        flush_rewrite_rules();

     }

     function deactive(){
        flush_rewrite_rules();
     }

    

     function custom_post_type(){
        
        register_post_type('Movie', ['public' => true, 'labels' => array('name' => __('Movies'), 'singular_name' => __('Movie'), 'add_new_item' => __('Add new movie'), 'add_new' => __('Add Movie'))]);

     }

     function enqueue(){
         wp_enqueue_style('pinoyfreecoderstyle', plugins_url('/assets/custom.css',__FILE__));
         wp_enqueue_script('pinoyfreecoderscript', plugins_url('/assets/custom.js',__FILE__));
     }

}

if(class_exists('PinoyFreeCoderPlugin')){

    $pinoyfreecoder = new PinoyFreeCoderPlugin();
    $pinoyfreecoder->register();

}

//activate
register_activation_hook(__FILE__, array($pinoyfreecoder, 'activate'));
//dactivate
register_deactivation_hook(__FILE__, array($pinoyfreecoder, 'deactivate'));
//uninstall
//register_uninstall_hook(__FILE__, array($pinoyfreecoder, 'uninstall'));