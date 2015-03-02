<?php

// Add meta boxes for posts

add_filter('rwmb_meta_boxes', 'rk_register_meta_boxes');

function rk_register_meta_boxes($mb) {
	$prefix = 'rk_';

	$mb[] = array(
		'id'		=> 'header_image',
		'title'		=> 'Header Image',
		'pages'		=> array('post'),
		'context'	=> 'normal',
		'priority'	=> 'high',

		'fields'	=> array(
			array(
				'id'		=> $prefix . 'header_image',
				'name'		=> 'Image',
				'type'		=> 'image_advanced'
			)
		)
	);

	$mb[] = array(
		'id'		=> 'tagline',
		'title'		=> 'Tagline',
		'pages'		=> array('post'),
		'context'	=> 'normal',
		'priority'	=> 'high',

		'fields'	=> array(
			array(
				'id'		=> $prefix . 'tagline',
				'name'		=> 'Tagline',
				'type'		=> 'textarea'
			)
		)
	);

	$mb[] = array(
		'id'		=> 'app-info',
		'title'		=> 'App Info',
		'pages'		=> array('post'),
		'context'	=> 'normal',
		'priority'	=> 'high',

		'fields'	=> array(
			array(
				'id'		=> $prefix . 'name',
				'name'		=> 'Name',
				'type'		=> 'text'
			),
			array(
				'id'		=> $prefix . 'appicon',
				'name'		=> 'App Icon',
				'type'		=> 'image_advanced'
			),
			array(
				'id'		=> $prefix . 'appstore-ios',
				'name'		=> 'App Store (iOS)',
				'type'		=> 'text'
			),
			array(
				'id'		=> $prefix . 'appstore-osx',
				'name'		=> 'App Store (OS X)',
				'type'		=> 'text'
			),
			array(
				'id'		=> $prefix . 'website',
				'name'		=> 'Website',
				'type'		=> 'text'
			),
		)
	);

	return $mb;
}

// Suport Featured Images for posts
add_theme_support( 'post-thumbnails' );

function rk_post_tagline($echo = true) {
	if (function_exists('rwmb_meta')) {
        $meta = rwmb_meta('rk_tagline', 'type=text');
        if (!empty($meta)) {
            if ($echo) {
            	echo $meta;
            } else {
            	return $meta;
            }
        }
    }
}

function rk_post_header_image() {
	$meta = rwmb_meta('rk_header_image', 'type=image&amp;size=original&amp;');

	if (count($meta) > 0) {
		$item = array_pop($meta);
		return $item["full_url"];
	}

	return "";
}

function rk_header_id() {
	if (function_exists('rwmb_meta') && is_single()) {
		return "single-post";
	} else {
		return "";
	}
}

function rk_retina_path($path) {
	$comps = split("\.", $path);

	return $comps[0] . "@2x." . $comps[1];
}

function rk_img($path, $class = NULL, $retina = true) {
	$imgpath = rk_img_url($path, false);
	$retpath = rk_retina_path($path);

	$str = "<img src=\"".$imgpath."\"";
	if ($retina) {
		$str .= " data-at2x=\"".$retpath."\"";
	}
	if (!is_null($class)) {
		$str .= " class=\"$class\"";
	}
	$str .= ">";

	echo $str;
}

function rk_img_url($path = "", $echo = true) {
	$url = rk_theme_url("/images/$path", false);
	if ($echo) {
		echo $url;
	} else {
		return $url;
	}
}

function rk_theme_url($path = "", $echo = true) {
	$url = "http://adventures.robo.cat/wp-content/themes/robotheme/$path";	
	if ($echo) {
		echo $url;
	} else {
		return $url;
	}
}

function rk_title() {
	return wp_title('~', true, right) . bloginfo('name');
}

function rk_meta_title() {
	return wp_title('', true, right);
}

function rk_meta_url() {
	return is_single() ? the_permalink() : "http://adventures.robo.cat";
}

function rk_meta_image() {
	if (is_single() && has_post_thumbnail(get_the_ID())) { 
		$tid = get_post_thumbnail_id(get_the_ID()); 
		$att = wp_get_attachment_image_src($tid, 'large'); 
		echo $att[0];
	} else { 
		echo rk_theme_url("apple-touch-icon.png", false);
	}
}

// Insert Images with captions using <figure> and <figcaption>

if (!function_exists( 'atg_figure_caption' )) {
	function atg_figure_caption( $output, $attr, $content ) {
		/* We're not worried abut captions in feeds, so just return the output here. */
		if ( is_feed() ) { return $output; }
		/* Set up the default arguments. */
		$defaults = array(
			'id' => '',
			'align' => 'alignnone',
			'width' => '',
			'caption' => ''
		);
		/* Merge the defaults with user input. */
		$attr = shortcode_atts( $defaults, $attr );
		/* If the width is less than 1, return the content wrapped between the [caption] tags. */
		if ( 1 > $attr['width'] ) { return $content; }
		/* Set up the attributes for the caption <figure>. */
		$attributes = ( !empty( $attr['id'] ) ? ' id="' . esc_attr( $attr['id'] ) . '"' : '' );
		$attributes .= ' class="wp-caption ' . esc_attr( $attr['align'] ) . '"';
		//$attributes .= ' style="width: ' . esc_attr( $attr['width'] ) . 'px"';
		/* Open the caption <figure>. */
		$output = '<figure' . $attributes .'>';
		/* Allow shortcodes for the content the caption was created for. */
		$output .= do_shortcode( $content );
		/* Append the caption text. */
		if ($attr['caption'] !== '') {
			$output .= '<figcaption class="wp-caption-text">' . $attr['caption'] . '</figcaption>';
		}
		/* Close the caption </figure>. */
		$output .= '</figure>';
		/* Return the formatted, clean figure & figcaption. */
		return $output;
	}
	
}

add_filter( 'img_caption_shortcode', 'atg_figure_caption', 10, 3 );

?>