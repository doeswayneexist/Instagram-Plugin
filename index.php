<?php 
/*
Plugin Name: 10k Instagram Feed
Plugin URI: http://www.10kproject.org
Description: A simple plugin to pull instagram photos.
Version: 0.1
Author: Wayne Smith
Author URI: http://www.10kproject.org
*/

/**
 * Copyright (c) 2013 Wayne Smith. All rights reserved.
 *
 * Released under the GPL license
 * http://www.opensource.org/licenses/gpl-license.php
 *
 * This is an add-on for WordPress
 * http://wordpress.org/
 *
 * **********************************************************************
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * **********************************************************************
 */

// link the plugin js in the head of the page
function add_10k_insta_plugin () {
	$jsURL = plugins_url('jq.insta.js' , __FILE__);

	echo "<script type='text/javascript' src='$jsURL' class='10k'></script>\n";
}

// hook the plugin js into the head
add_action( 'wp_head', 'add_10k_insta_plugin');

// link the plugin css in the head of the page
function add_10k_insta_plugin_css () {
	$jsURL = plugins_url('jq.insta.css' , __FILE__);

	echo "<link rel='stylesheet' href='$jsURL' class='10k'>\n";
}

// hook the plugin into the head
add_action( 'wp_head', 'add_10k_insta_plugin_css');

// replace any instances of the short code [10kig] with an instagram stream
add_shortcode( '10kig', function ($atts) {

	$loc = $atts['loc'];
	$show = $atts['show'];
	$hash = $atts['hash'];

	$content = "<div class='instagram'></div> <script>jQuery(function() {
  					jQuery('.instagram').instagram({
      				clientId: 'd938d371b7214584a6fbc5cb9f9285fc'
    					, locationId: '2003946'
  					});
					});</script>";

	return $content;
});

?>