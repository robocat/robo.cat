<?php

function rk_retina_path($path) {
	$comps = $path.split(".");

	return $comps[0] . "@2x." . $comps[1];
}

function rk_img($path, $class = NULL, $retian = true) {
	$imgpath = rk_img_url($path);
	$retpath = rk_retina_path($path);

	$str = "<img src\"$imgpath\"";
	if ($retina) {
		$str .= " data-at2x=\"$retpath\"";
	}
	if (!is_null($class)) {
		$str .= " class=\"$class\"";
	}
	$str .= ">";

	return $str;
}

function rk_img_url($path = "") {
	return rk_theme_url() + "/images/$path";
}

function rk_theme_url($path = "") {
	return bloginfo('template_url') + "/$path";	
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
		return $att[0];
	} else { 
		return rk_theme_url("apple-touch-icon.png");
	}
}

?>
