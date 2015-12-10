<?php

/*
	Plugin Name: Document Diary
	Plugin URI: http://wordpress.com/
	Description: Document diary
	Author: Justin Smith
	Version: 1.0
	Author URI: http://wordpress.com/
	License: GPL v2 or later
*/

include( 'acf-options.php' );
include( 'gas-options.php' );
require_once( plugin_dir_path( __FILE__ ) . 'Page_Template_Plugin.class.php' );
add_action( 'plugins_loaded', array( 'Page_Template_Plugin', 'get_instance' ) );

add_action( 'wp_enqueue_scripts', 'plugin_scripts' );
function plugin_scripts() {
	wp_enqueue_script(
		'google-maps',
		'//maps.googleapis.com/maps/api/js?key=AIzaSyBQ9oqdTZwyoYTQmp6aysUg33mlUH9yftg&callback=initMap',
		array(),
		'1.0',
		true
	);
}

add_filter( 'the_content', 'diary_documents' );
function diary_documents( $content ){
	global $post;

	$output = '';

	$args = array(
		'post_type' => 'attachment',
		'post_parent' => $post->ID,
		'post_status' => 'any',
		'post_per_page' => -1
	);

	$attachments = get_posts( $args );

	if( !empty( $attachments ) ) {
		$output .= '<h3>Attachments</h3><ul>';
		foreach( $attachments as $attachment ) {
			$output .= '<li> ' . $attachment->post_content . ' Page ' . get_field( 'page', $attachment->ID ) . ' | <a href="' . wp_get_attachment_url( $attachment->ID ) . '">View</a> | <a href="' . get_field( 'google_drive_link', $attachment->ID ) . '">Google Docs</a> </li>';
		}

		$output .= '</ul>';
	}

	$basic_data = array();

	$basic_data['Document ID'] = get_field( 'document_id' );
	$basic_data['Date'] = get_field( 'date' );
	$basic_data['Valid Until'] = get_field( 'valid_until' );

	if( !empty($basic_data) ) {
		$output .= '<h3>Basic Details</h3>';
		$output .= '<div class="row"><div class="col-md-6"><table class="table"><tbody>';
		foreach( $basic_data as $name => $value ) {
			if (!empty( $value ) ) {
				$output .= '<tr>';
				$output .= '<th>'. $name .'</th><td>' . $value . '</td>';
				$output .= '</tr>';
			}
		}
		$output .= '</tbody></table></div></div>';
	}
	$location = get_field( 'origin' );
	if( !empty( $location ) && is_single() ) {

	    $output .= "<div class='row'><div class='col-md-6'><h3>Location</h3>";

	    $id = rand( 222, 31493 );
	    $output .= "<div class='map' style='height:300px; width:500px; margin-bottom: 1.6842em' id='map-" . $id ."'></div></div></div>";
	    $output .= "
	        <script type='text/javascript'>
	        	var map;
	        	var map_center = {lat: " . $location['lat'] . ", lng: " . $location['lng'] . "}
    	        function initMap() {
    	        	map = new google.maps.Map(document.getElementById('map-" . $id . "'), {
    	        		center: map_center,
    	        		zoom: 10
    	        	})
					marker = new google.maps.Marker({
						position: map_center,
						map: map
					})
    	        }
	        </script>
	        <script async defer
      			src='https://maps.googleapis.com/maps/api/js?key=AIzaSyBQ9oqdTZwyoYTQmp6aysUg33mlUH9yftg&callback=initMap'>
    		</script>
	    ";
	}
	return $content . $output;
}
