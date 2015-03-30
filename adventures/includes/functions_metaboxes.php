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

?>