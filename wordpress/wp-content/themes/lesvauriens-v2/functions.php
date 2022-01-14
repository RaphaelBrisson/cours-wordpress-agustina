<?php

add_action('wp_enqueue_scripts', function () {
	wp_enqueue_style('app.css', get_theme_file_uri('/assets/dist/css/app.min.css'), false, null);
	wp_enqueue_script('app.js', get_theme_file_uri('/assets/dist/js/app.min.js'), array('jquery'), 1.0, true);

	wp_localize_script( 'app.js', 'Theme', array(
		'server_url'     => get_bloginfo( 'url' ),
		'theme_url'      => get_template_directory_uri(),
		'ajax_url'       => admin_url( 'admin-ajax.php' ),
	) );
}, 100);


add_action( 'admin_menu', function () {
	remove_menu_page( 'edit-comments.php' );
} );


if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}


register_nav_menus(
	array(
		'primary_navigation' => 'Navigation principale',
	)
);


function getThumbnail( $post_id = false, $size = 'full', $has_default = true, $array = false ) {
	global $post;

	$id_attachment = null;
	$thumbnail = '';

	if ( false === $post_id ) {
		$post_id = $post->ID;
	}

	if ( has_post_thumbnail( $post_id ) ) {
		$id_attachment = get_post_thumbnail_id( $post_id );
	}

	if ( is_null( $id_attachment ) && $has_default ) {
		$id_attachment = get_field( 'defaultImage', 'option' );
	}

	if ( is_array( $size ) && function_exists( 'fly_get_attachment_image_src' ) ) {
		$attachment = fly_get_attachment_image_src( $id_attachment, $size, true );
	} else {
		$attachment = wp_get_attachment_image_src( $id_attachment, $size );
	}

	if ( is_array( $attachment ) ) {

		if ( $array === false ) {
			$thumbnail = isset( $attachment[ 'src' ] ) ? $attachment[ 'src' ] : $attachment[ 0 ];
		} else {
			$thumbnail = $attachment;
			// If you use custom size with the plugin "Fly Dynamic Image Resizer", src = $thumbnail['src'], width = $thumbnail['width'], height = $thumbnail['height'].
			// If you use image size from ThemeFrontend, src = $thumbnail['0'], width = $thumbnail['1'], height = $thumbnail['2'].
		}
	}

	return $thumbnail;
}


// Evenements
register_post_type( 'evenement', array(
	'labels'              => array(
		'name'               => 'Évenements',
		'singular_name'      => 'Évenements',
		'menu_name'          => 'Évenements',
		'add_new'            => 'Ajouter un événement',
		'add_new_item'       => 'Ajouter un événement',
		'edit_item'          => 'Modifier l\'événement',
		'new_item'           => 'Nouvel événement',
		'view'               => 'Voir l\'événement',
		'view_item'          => 'Voir l\'événement',
		'search_items'       => 'Rechercher un événement',
		'not_found'          => 'Aucun événement trouvé',
		'not_found_in_trash' => 'Aucune événement trouvé dans la corbeille',
	),
	'parent_item_colon'   => '',
	'public'              => true,
	'publicly_queryable'  => true,
	'show_ui'             => true,
	'query_var'           => true,
	'exclude_from_search' => false,
	'capability_type'     => 'post',
	'hierarchical'        => false,
	'menu_icon'           => 'dashicons-calendar',
	'has_archive'         => true,
	'show_in_rest'        => true,
	'supports'            => array(
		'title',
		'editor',
		'revisions',
		'author',
		'page-attributes',
		'thumbnail',
		'custom-fields'
	),
));


add_filter( 'template_include', function($template) {
	if ( is_page( get_field('pageEvenements', 'option') ) ) {
		return locate_template( 'archive-evenement.php' );
	}
	else {
		return $template;
	}
} );


add_action( 'after_setup_theme', function ()
{
	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'editor-color-palette' );
	add_theme_support( 'disable-custom-colors' );

	// Remove gradient
	add_theme_support( 'editor-gradient-presets', array() );
	add_theme_support( 'disable-custom-gradients' );

	// Remove font size
	add_theme_support( 'editor-font-sizes', array() );
	add_theme_support( 'disable-custom-font-sizes' );

	// Remove patterns
	remove_theme_support( 'core-block-patterns' );
} );

add_action( 'enqueue_block_editor_assets', function ()
{
	wp_enqueue_script(
		'wpiris-block',
		get_theme_file_uri( '/admin/js/block.js' ),
		array(
			'wp-blocks',
			'wp-edit-post',
			'wp-dom-ready',
		),
		'1.0',
		true
	);
});

add_filter( 'allowed_block_types_all', function ()
{
	return array(
		// common.
		'core/paragraph',
		'core/heading',
		'core/list',
		'core/gallery',
		'core/image',
		'core/video',
		'core/audio',

		// formatting.
		'core/table',

		// layout.
		'core/buttons',
		'core/columns',

		// widgets.
		'core/shortcode',

		// embed.
		'core/embed',
	);
}, 10, 2 );
