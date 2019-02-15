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


add_action( 'admin_menu', 'torre_resume' );

function torre_resume() {

  $page_title = 'Torre resume';
  $menu_title = 'Resume';
  $capability = 'manage_options';
  $menu_slug  = 'torre-resume';
  $function   = 'torre_resume';
  $icon_url   = 'dashicons-media-document';
  $position   = 4;

  add_menu_page( $page_title,
                 $menu_title, 
                 $capability, 
                 $menu_slug, 
                 $function, 
                 $icon_url, 
                 $position );
}
    
  

?>