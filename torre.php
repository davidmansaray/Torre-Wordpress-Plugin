<?php
/**
 * Plugin Name: My Resume by Torre.co
 * Plugin URI:  https://davidmansaray.com
 * Description: Quickly include your Torre.co bio on your Wordpress site.
 * Version:     1.0.0
 * Author:      David Mansaray
 * Author URI:  https://davidmansaray.com
 * License:     GPL2
 */


// Register resume admin menu 

add_action( 'admin_menu', 'torre_resume_menu' );

function torre_resume_menu() {

    $page_title = 'Torre resume';
    $menu_title = 'Resume';
    $capability = 'manage_options';
    $menu_slug  = 'torre-resume';
    $function   = 'torre_resume_settings';
    $icon_url   = 'dashicons-media-document';
    $position   = 4;

    add_menu_page( $page_title,
                 $menu_title, 
                 $capability, 
                 $menu_slug, 
                 $function, 
                 $icon_url, 
                 $position);
   
}

//Torre resume plugin settings page

function torre_resume_settings () {
    if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	echo '<div class="wrap">';
	echo '<p>This is where the form which will capture the Torre username will go</p>';
	echo '</div>';
}



?>