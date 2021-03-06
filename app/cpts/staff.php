<?php
// Register Custom Post Type
function register_staff() {

$labels = array(
'name'                  => _x( 'Staff', 'Post Type General Name', 'basis' ),
'singular_name'         => _x( 'Staff', 'Post Type Singular Name', 'basis' ),
'menu_name'             => __( 'Staff', 'basis' ),
'name_admin_bar'        => __( 'Staff', 'basis' ),
'archives'              => __( 'Staff Archives', 'basis' ),
'attributes'            => __( 'Staff Attributes', 'basis' ),
'parent_item_colon'     => __( 'Parent Staff:', 'basis' ),
'all_items'             => __( 'All Staff', 'basis' ),
'add_new_item'          => __( 'Add New Staff', 'basis' ),
'add_new'               => __( 'Add New', 'basis' ),
'new_item'              => __( 'New Staff', 'basis' ),
'edit_item'             => __( 'Edit Staff', 'basis' ),
'update_item'           => __( 'Update Staff', 'basis' ),
'view_item'             => __( 'View Staff', 'basis' ),
'view_items'            => __( 'View Staff', 'basis' ),
'search_items'          => __( 'Search Staff', 'basis' ),
'not_found'             => __( 'Not found', 'basis' ),
'not_found_in_trash'    => __( 'Not found in Trash', 'basis' ),
'featured_image'        => __( 'Staff Image', 'basis' ),
'set_featured_image'    => __( 'Set staff image', 'basis' ),
'remove_featured_image' => __( 'Remove staff image', 'basis' ),
'use_featured_image'    => __( 'Use as staff image', 'basis' ),
'insert_into_item'      => __( 'Insert into staff', 'basis' ),
'uploaded_to_this_item' => __( 'Uploaded to this staff', 'basis' ),
'items_list'            => __( 'Staff list', 'basis' ),
'items_list_navigation' => __( 'Staff list navigation', 'basis' ),
'filter_items_list'     => __( 'Filter staff list', 'basis' ),
);
$args = array(
'label'                 => __( 'Staff', 'basis' ),
'description'           => __( 'A list of Staff', 'basis' ),
'labels'                => $labels,
'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions' ),
'taxonomies'            => [],
'hierarchical'          => true,
'public'                => true,
'show_ui'               => true,
'show_in_menu'          => true,
'menu_position'         => 5,
'menu_icon'             => 'dashicons-groups',
'show_in_admin_bar'     => true,
'show_in_nav_menus'     => true,
'can_export'            => true,
'has_archive'           => true,
'rewrite'            => array( 'slug' => 'team' ),
'exclude_from_search'   => false,
'publicly_queryable'    => true,
'capability_type'       => 'page',
);
register_post_type( 'staff', $args );

}
add_action( 'init', 'register_staff', 0 );

// Register Custom Taxonomy - Department for Staff
function staff_department() {

	$labels = array(
		'name'                       => _x( 'Department', 'Taxonomy General Name', 'basis' ),
		'singular_name'              => _x( 'Department', 'Taxonomy Singular Name', 'basis' ),
		'menu_name'                  => __( 'Departments', 'basis' ),
		'all_items'                  => __( 'All Departments', 'basis' ),
		'parent_item'                => __( 'Parent Department', 'basis' ),
		'parent_item_colon'          => __( 'Parent Department:', 'basis' ),
		'new_item_name'              => __( 'New Department Name', 'basis' ),
		'add_new_item'               => __( 'Add New Department', 'basis' ),
		'edit_item'                  => __( 'Edit Department', 'basis' ),
		'update_item'                => __( 'Update Department', 'basis' ),
		'view_item'                  => __( 'View Department', 'basis' ),
		'separate_items_with_commas' => __( 'Separate departments with commas', 'basis' ),
		'add_or_remove_items'        => __( 'Add or remove department', 'basis' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'basis' ),
		'popular_items'              => __( 'Hot Departments', 'basis' ),
		'search_items'               => __( 'Search Department', 'basis' ),
		'not_found'                  => __( 'Not Found', 'basis' ),
		'no_terms'                   => __( 'No Departments', 'basis' ),
		'items_list'                 => __( 'Departments list', 'basis' ),
		'items_list_navigation'      => __( 'Departments list navigation', 'basis' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'department', array( 'staff' ), $args );

}
add_action( 'init', 'staff_department', 1 );

/**
 * ACF Options Page
 *
 */

add_action( 'init', function() {
	if ( function_exists( 'acf_add_options_sub_page' ) ){
		acf_add_options_sub_page( array(
			'title'      => 'Staff Page Settings',
			'parent'     => 'edit.php?post_type=staff',
			'capability' => 'manage_options'
		) );
	}
});