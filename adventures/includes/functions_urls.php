<?php

function rk_img_url($path = "", $echo = true) {
	return rk_theme_url("/images/$path", $echo);
}

function rk_theme_url($path = "", $echo = true) {
	$url = get_bloginfo('template_url') . "/$path";
	if ($echo) {
		echo $url;
	} else {
		return $url;
	}
}

?>