<?php
/**
 * Post Types
 *
 * Registers post types and taxonomies.
 *
 * @package WP Property List
 * @version 1.0.0
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

/**
 * Post types Class.
 */
class WPProperty_Post_Types {

	/**
	 * Hook in methods.
	 */
	public static function init() {
		add_action( 'init', array( __CLASS__, 'register_taxonomies' ) );
		add_action( 'init', array( __CLASS__, 'register_post_types' ) );
	}

	/**
	 * Register core taxonomies
	 */
	public static function register_taxonomies() {

		if ( ! is_blog_installed() ) {
			return;
		}

		if ( taxonomy_exists( 'property_cat' ) ) {
			return;
		}

		register_taxonomy( 'property_cat',
			apply_filters( 'wpproperty_taxonomy_objects_Property_cat', array( 'property' ) ),
			apply_filters( 'wpproperty_taxonomy_args_Property_cat',
				array(
					'hierarchical'          => true,
					'label'                 => __( 'Categories', 'WPProperty' ),
					'labels'                => array(
						'name'                  => __( 'Property categories', 'WPproperty' ),
						'singular_name'         => __( 'Category', 'WPproperty' ),
						'menu_name'             => _x( 'Categories', 'Admin menu name', 'WPproperty' ),
						'search_items'          => __( 'Search categories', 'WPproperty' ),
						'all_items'             => __( 'All categories', 'WPproperty' ),
						'parent_item'           => __( 'Parent category', 'WPproperty' ),
						'parent_item_colon'     => __( 'Parent category:', 'WPproperty' ),
						'edit_item'             => __( 'Edit category', 'WPproperty' ),
						'update_item'           => __( 'Update category', 'WPproperty' ),
						'add_new_item'          => __( 'Add new category', 'WPproperty' ),
						'new_item_name'         => __( 'New category name', 'WPproperty' ),
						'not_found'             => __( 'No categories found', 'WPproperty' ),
						'item_link'             => __( 'Property Category Link', 'WPproperty' ),
						'item_link_description' => __( 'A link to a product category.', 'WPproperty' ),
					),
					'show_in_rest'          => true,
					'show_ui'               => true,
					'query_var'             => true,
					'show_admin_column'		=> true,
					'rewrite'               => array(
						'slug'         => 'property-category',
						'with_front'   => false,
						'hierarchical' => true,
					),
				)
			)
		);

    }

	/**
	 * Register core post types.
	 */
	public static function register_post_types() {

		// Check if post type register
		if ( ! is_blog_installed() || post_type_exists( 'property' ) ) {
			return;
		}

		// register Property post type
		register_post_type( 'property',
			apply_filters( 'wpproperty_register_post_type_property',
				array(
					'labels'				=> array(
						'name'					=> __( 'Property', 'wpproperty' ),
						'singular_name'			=> __( 'Property', 'wpproperty' ),
						'all_items'				=> __( 'All Property', 'wpproperty' ),
						'menu_name'				=> _x( 'Property', 'Admin menu name', 'wpproperty' ),
						'add_new'				=> __( 'Add New', 'wpproperty' ),
						'add_new_item'			=> __( 'Add new Property', 'wpproperty' ),
						'edit'					=> __( 'Edit', 'wpProperty' ),
						'edit_item'				=> __( 'Edit Property', 'wpproperty' ),
						'new_item'				=> __( 'New Property', 'wpproperty' ),
						'view_item'				=> __( 'View Property', 'wpproperty' ),
						'view_items'			=> __( 'View Property', 'wpproperty' ),
						'search_items'			=> __( 'Search Property', 'wpproperty' ),
						'not_found'				=> __( 'No Property found', 'wpproperty' ),
						'not_found_in_trash'	=> __( 'No Property found in trash', 'wpproperty' ),
						'parent'				=> __( 'Parent Property', 'wpproperty' ),
						'featured_image'		=> __( 'Property poster', 'wpproperty' ),
						'set_featured_image'	=> __( 'Set Property poster', 'wpproperty' ),
						'remove_featured_image'	=> __( 'Remove Property poster', 'wpproperty' ),
						'use_featured_image'	=> __( 'Use as Property poster', 'wpproperty' ),
						'insert_into_item'		=> __( 'Insert into Property', 'wpproperty' ),
						'uploaded_to_this_item'	=> __( 'Uploaded to this Property', 'wpproperty' ),
						'filter_items_list'		=> __( 'Filter Property', 'wpproperty' ),
						'items_list_navigation'	=> __( 'Property navigation', 'wpproperty' ),
						'items_list'			=> __( 'Property list', 'wpproperty' ),
						'item_link'				=> __( 'Property Link', 'wpproperty' ),
						'item_link_description'	=> __( 'A link to a Property.', 'wpproperty' ),
					),
					'description'			=> __( 'This is where you can browse property.', 'wpproperty' ),
					'public'				=> true,
					'show_ui'				=> true,
					'menu_icon'				=> 'dashicons-admin-home',
					'capability_type'		=> 'post',
					'map_meta_cap'			=> true,
					'publicly_queryable'	=> true,
					'exclude_from_search'	=> false,
					'hierarchical'			=> false, // Hierarchical causes memory issues - WP loads all records!
					'rewrite'				=> array(
							'slug'				=> 'property',
							'with_front'		=> false,
							'feeds'				=> true,
						),
					'query_var'				=> true,
					'supports'				=> array( 'title', 'editor', 'thumbnail', 'excerpt', 'author' ),
					'has_archive'			=> true,
					'show_in_nav_menus'		=> true,
					'show_in_rest'			=> true,
				)
			)
		); // Complete of register Property post type

	}

}

WPProperty_Post_Types::init();
