<?php
/**
* Trigger this file on plugin uninstall
* 
* @package PinoyfreeCoderPlugin
*/
if(!defined('WP_UNINSTALL_PLUGIN')){
    die;
}

//Clear database meron movie
$movies = get_post( array('post_type' => 'movie', 'numberposts' => -1));

foreach($movies as $movie){

    wp_delete_post($movie->ID, true);
}

// global $wpdb;
// $wpdb->query("DELETE FROM wp_posts WHERE post_type = 'movie'");
// $wpdb->query("DELETE FROM wp_postmeta WHERE post_id NOT IN(SELECT if FROM wp_posts)");
// $wpdb->query("DELETE FROM wp_term_relationships WHERE object_id NOT IN(SELECT if FROM wp_posts)");
