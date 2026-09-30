<?php
/**
 * Admin Class
 * 
 * Manage admin side functionalities
 * 
 * @package WP Property List
 * @version 1.0.0
 */

//Exit of accessed directly
defined( 'ABSPATH' ) || exit;

/**
 * Post types Class.
 */
class WPProperty_Admin {
    /**
	 * Hook in methods.
	 */
	public static function init() {
		
		// Add metabox
		add_action( 'add_meta_boxes', array(__CLASS__, 'add_posttypes_meta_boxes') );

		// Save metabox
		add_action( 'save_post', array(__CLASS__, 'save_posttypes_meta_boxes'), 10, 2 );

	}

	/**
	 * Add custom post type metaboxes
	 */
    public static function add_posttypes_meta_boxes() {
		// roperty details box
		add_meta_box(
			'wpproperty-property-details',
			esc_html__( 'property Details', 'wpproperty' ),
			array( __CLASS__, 'property_details_metabox' ),
			'property', 'normal', 'core'
		);
	}

    
	/**
	 * Add property details metabox
	 */
	public static function property_details_metabox() {
		require_once( ENH_THEME_DIR . '/include/admin/metabox/wpenh-property-details.php' );

	}

	/**
	 * save custom post type metaboxes
	 */
	public static function save_posttypes_meta_boxes( $post_id, $post ) {
		
		// Get post type object
		$post_type_object = get_post_type_object( $post->post_type );

		// Check the permission of save
		if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) // Check Autosave
			|| ( ! current_user_can( $post_type_object->cap->edit_post, $post_id ) ) // Check permission
			 ) {
				return $post_id;
		}

		// Check if order post type
		if ( 'property' == $post->post_type ) {
			if ( isset($_POST['_property_price']) ) {
				update_post_meta( $post_id, '_property_price', sanitize_text_field($_POST['_property_price']) );
			}
			if ( isset($_POST['_property_type']) ) {
				update_post_meta( $post_id, '_property_type', sanitize_text_field($_POST['_property_type']) );
			}
			if ( isset($_POST['_property_location']) ) {
				update_post_meta( $post_id, '_property_location', sanitize_text_field($_POST['_property_location']) );
			}
			if ( isset($_POST['_property_furnished_type']) ) {
				update_post_meta( $post_id, '_property_furnished_type', sanitize_text_field($_POST['_property_furnished_type']) );
			}
            if ( isset($_POST['_property_bed']) ) {
				update_post_meta( $post_id, '_property_bed', sanitize_text_field($_POST['_property_bed']) );
			}
			if ( isset($_POST['_property_bath']) ) {
				update_post_meta( $post_id, '_property_bath', sanitize_text_field($_POST['_property_bath']) );
			}
			if ( isset($_POST['_property_square_feet']) ) {
				update_post_meta( $post_id, '_property_square_feet', sanitize_text_field($_POST['_property_square_feet']) );
			}
			if ( isset($_POST['_property_contact_number']) ) {
				update_post_meta( $post_id, '_property_contact_number', sanitize_text_field($_POST['_property_contact_number']) );
			}
			if ( isset($_POST['_property_email']) ) {
				update_post_meta( $post_id, '_property_email', sanitize_text_field($_POST['_property_email']) );
			}
			
		}

		// can do for other post types too
	}

}

WPproperty_Admin::init();  
   
