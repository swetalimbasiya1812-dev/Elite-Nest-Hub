<?php
/**
 * Public Class
 *
 * Handles theme's frontend side functionality.
 *
 * @package WP Property List
 * @version 1.0.0
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

/**
 * Post types Class.
 */
class WPProperty_Public {

	/**
	 * Hook in methods.
	 */
	public static function init() {
		add_action( 'wp_ajax_wpenh_register_user', array( __CLASS__, 'wpenh_register_user' ) );
		add_action( 'wp_ajax_nopriv_wpenh_register_user', array( __CLASS__, 'wpenh_register_user' ) );
		add_action( 'wp_ajax_wpenh_manage_property', array( __CLASS__, 'wpenh_manage_property' ) );
		add_action( 'wp_ajax_nopriv_wpenh_manage_property', array( __CLASS__, 'wpenh_manage_property') );
		add_action( 'wp_ajax_wpenh_delete_property', array( __CLASS__, 'wpenh_delete_property' ) );
		add_action( 'wp_ajax_nopriv_wpenh_delete_property', array( __CLASS__, 'wpenh_delete_property') );
	}

	/**
	 * Register core taxonomies
	 */
	public static function wpenh_register_user() {
		$firstname = isset( $_POST['firstname'] ) ? $_POST['firstname'] : '';
		$lastname = isset( $_POST['lastname'] ) ? $_POST['lastname'] : '';
		$email = isset( $_POST['email'] ) ? $_POST['email'] : '';
		$password = isset( $_POST['password'] ) ? $_POST['password'] : '';

		if ( empty( $firstname ) ) {
			wp_send_json( array(
				'success' => 'false',
				'message' => 'Please enter firstname!'
			) );
			exit;
		}
		if ( empty( $email ) ) {
			wp_send_json( array(
				'success' => 'false',
				'message' => 'Please enter email!'
			) );
			exit;
		}
		if ( empty( $password) ) {
			wp_send_json( array(
				'success' => 'false',
				'message' => 'Please enter password!'
			) );
			exit;
		}

		$userid = wp_create_user( $email, $password, $email );
		if ( ! $userid || is_wp_error( $userid ) ) {
			wp_send_json( array(
				'success' => 'false',
				'message' => $userid->get_error_message()
			) );
			exit;
		}

		$update = wp_update_user( [
			'ID' => $userid, // this is the ID of the user you want to update.
			'first_name' => $firstname,
			'last_name' => $lastname,
			
		] );
		
		// Send success message.
		wp_send_json( array(
			'success' => 'true',
			'userid' => $userid,
			'message' => 'You have been registered successfully!'
		) );
		exit;
	}

	/**
	 * Register core taxonomies
	 */
	public static function wpenh_manage_property() {

		// error_reporting(E_ALL);
		// ini_set('display_errors', '1');

		$post_id = isset( $_POST['post_id'] ) ? $_POST['post_id'] : '';
		$title = isset( $_POST['title'] ) ? $_POST['title'] : '';
		$description = isset( $_POST['description'] ) ? $_POST['description'] : '';
		$price = isset( $_POST['price'] ) ? $_POST['price'] : '';
		$type = isset( $_POST['type'] ) ? $_POST['type'] : '';
		$location = isset( $_POST['location'] ) ? $_POST['location'] : '';
		$furnished_type = isset( $_POST['furnished_type'] ) ? $_POST['furnished_type'] : '';
		$bed = isset( $_POST['bed'] ) ? $_POST['bed'] : '';
		$bath = isset( $_POST['bath'] ) ? $_POST['bath'] : '';
		$square_feet = isset( $_POST['square_feet'] ) ? $_POST['square_feet'] : '';
		$contact_number = isset( $_POST['contact_number'] ) ? $_POST['contact_number'] : '';
		$email = isset( $_POST['email'] ) ? $_POST['email'] : '';
		
		if ( empty( $title ) ) {
			wp_send_json( array(
				'success' => 'false',
				'message' => 'Please enter title!'
			) );
			exit;
		}	
		if ( empty( $description ) ) {
			wp_send_json( array(
				'success' => 'false',
				'message' => 'Please enter description!'
			) );
			exit;
		}
		if ( empty( $price ) ) {
			wp_send_json( array(
				'success' => 'false',
				'message' => 'Please enter price!'
			) );
			exit;
		}
		if ( empty( $type ) ) {
			wp_send_json( array(
				'success' => 'false',
				'message' => 'Please enter type!'
			) );
			exit;
		}
		if ( empty( $location ) ) {
			wp_send_json( array(
				'success' => 'false',
				'message' => 'Please enter location!'
			) );
			exit;
		}
		if ( empty( $furnished_type ) ) {
			wp_send_json( array(
				'success' => 'false',
				'message' => 'Please enter furnished_type!'
			) );
			exit;
		}
		if ( empty( $bed) ) {
			wp_send_json( array(
				'success' => 'false',
				'message' => 'Please enter bed!'
			) );
			exit;
		}
		if ( empty( $bath) ) {
			wp_send_json( array(
				'success' => 'false',
				'message' => 'Please enter bath!'
			) );
			exit;
		}
		if ( empty( $square_feet) ) {
			wp_send_json( array(
				'success' => 'false',
				'message' => 'Please enter square_feet!'
			) );
			exit;
		}
		if ( empty( $contact_number) ) {
			wp_send_json( array(
				'success' => 'false',
				'message' => 'Please enter contact_number!'
			) );
			exit;
		}
		if ( empty( $email) ) {
			wp_send_json( array(
				'success' => 'false',
				'message' => 'Please enter email!'
			) );
			exit;
		}

		if ( ! empty( $post_id ) && 0 !== $post_id ) {
			$postid = wp_update_post( array(
				'ID'           => $post_id,
				'post_title'   => $title, 
				'post_content' => $description, 
			) );
		} else {
			$postid = wp_insert_post( array(
				'post_title'   => $title, 
				'post_content' => $description, 
				'post_status'  => 'draft',
				'post_type'    => 'property',
				'post_author'  => get_current_user_id()
			) );
		}

		if ( ! $postid || is_wp_error( $postid ) ) {
			wp_send_json( array(
				'success' => 'false',
				'message' => $postid->get_error_message()
			) );
			exit;
		}

		update_post_meta( $postid, '_property_price', sanitize_text_field( $price ) );
		update_post_meta( $postid, '_property_type', sanitize_text_field($type) );
		update_post_meta( $postid, '_property_location', sanitize_text_field($location) );
		update_post_meta( $postid, '_property_furnished_type', sanitize_text_field($furnished_type) );
		update_post_meta( $postid, '_property_bed', sanitize_text_field($bed) );
		update_post_meta( $postid, '_property_bath', sanitize_text_field($bath) );
		update_post_meta( $postid, '_property_square_feet', sanitize_text_field($square_feet) );
		update_post_meta( $postid, '_property_contact_number', sanitize_text_field($contact_number) );
		update_post_meta( $postid, '_property_email', sanitize_text_field($email) );
		
		// Send success message.
		wp_send_json( array(
			'success' => 'true',
			'postid' => $postid,
			'message' => 'You property has been saved successfully, please wait we will check and approve it.!'
		) );
		exit;
	}

	/**
	 * Register core taxonomies
	 */
	public static function wpenh_delete_property() {

		$property_id = isset( $_POST['property_id'] ) ? $_POST['property_id'] : '';

		if ( empty( $property_id ) ) {
			wp_send_json( array(
				'success' => 'false',
				'message' => 'Property not found, please refresh the page and try again!'
			) );
			exit;
		}

		// WP Delete posts.
		$trashed = wp_trash_post( $property_id );

		if ( $trashed ) {
			wp_send_json( array(
				'success' => 'true',
				'message' => 'Product has been deleted successfully!'
			) );
			exit;
		}

		wp_send_json( array(
			'success' => 'false',
			'message' => 'Something goes wrong, please try again!'
		) );
		exit;
	}
}

WPProperty_Public::init();
