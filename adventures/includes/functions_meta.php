<?php

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

function rk_header_id() {
	if (function_exists('rwmb_meta') && is_single()) {
		return "single-post";
	} else {
		return "";
	}
}

function rk_site_title() {
	wp_title('~', true, right);
	bloginfo('name');
}

function rk_site_description() {
	if (is_single()) {
		echo strip_tags(get_the_excerpt());
	} else {
		bloginfo("description");
	}
}

function rk_meta_title() {
	wp_title('', true, right);
}

function rk_meta_permalink() {
	if (is_single()) {
		the_permalink();
	} else {
		home_url();
	}
}

function rk_meta_image() {
	if (is_single() && has_post_thumbnail(get_the_ID())) { 
		$tid = get_post_thumbnail_id(get_the_ID()); 
		$att = wp_get_attachment_image_src($tid, 'large'); 
		echo $att[0]; 
	} else { 
		rk_theme_url("apple-touch-icon.png", true);
	}
}

function rk_meta_description() {
	$tagline = rk_post_tagline(false);
	if (!empty($tagline)) {
		echo $tagline;
	} else {
		rk_site_description();
	}
}

?>