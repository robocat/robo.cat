<?php

function rk_flush_rewrites() {
  global $wp_rewrite;
  $wp_rewrite->flush_rules();
}

add_action('admin_init', 'rk_flush_rewrites');
add_action('generate_rewrite_rules', 'rk_roots_add_rewrites');


// Suport Featured Images for posts
add_theme_support( 'post-thumbnails' );


?>