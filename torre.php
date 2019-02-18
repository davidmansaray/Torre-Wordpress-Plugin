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
    $function   = 'torre_resume_settings_html';
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

function torre_resume_settings_html () {
    if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
    
    if (isset($_POST['torre_username'])) {
        $value = $_POST['torre_username'];
        update_option('torre_username', $value);
    }

    $value = get_option('torre_username');
        
	
    include 'username-form.php';
 
	
}


// Register and load widget
function torre_load_widget() {
    register_widget( 'torre_profile_card_widget' );
}
add_action( 'widgets_init', 'torre_load_widget' );
 
// Creating widget 
class torre_profile_card_widget extends WP_Widget {
 
function __construct() {
parent::__construct(
 
// Base ID of widget
'torre_profile_card_widget', 
 
// Widget name that  will appear in UI
__('Torre profile card Widget', 'torre_profile_card_widget_domain'), 
 
// Widget description
array( 'description' => __( 'Show your Torre.co profile card in the sidebar', 'torre_profile_card_widget_domain' ), ) 
);
}
 
//  Widget front-end
 
public function widget( $args, $instance ) {
    include 'torre_widget.php';

 
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];
 
// Display output

echo $args['after_widget'];
}
         
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'New title', 'torre_profile_card_widget_domain' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php 
}
     
// Updating widget and replace old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
} // Class torre_profile_card_widget ends here


?>