<?php

function rk_retina_path($path) {
	$comps = split("\.", $path);
	return $comps[0] . "_2x." . $comps[1];
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

function rk_post_header_image() {
	$meta = rwmb_meta('rk_header_image', 'type=image&amp;size=original&amp;');

	if (count($meta) > 0) {
		$item = array_pop($meta);
		return $item["full_url"];
	}

	return "";
}

?>