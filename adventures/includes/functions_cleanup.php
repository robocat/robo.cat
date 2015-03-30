<?php
add_action('init', 'rk_head_cleanup');

function rk_head_cleanup() {
  remove_action('wp_head', 'feed_links', 2);
  remove_action('wp_head', 'feed_links_extra', 3);
  remove_action('wp_head', 'rsd_link');
  remove_action('wp_head', 'wlwmanifest_link');
  remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
  remove_action('wp_head', 'wp_generator');
  remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

  global $wp_widget_factory;
  remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));

  add_filter('use_default_gallery_style', '__return_null');
}

function rk_roots_add_rewrites($content) {
  $theme_name = next(explode('/themes/', get_stylesheet_directory()));
  global $wp_rewrite;
  $roots_new_non_wp_rules = array(
    'css/(.*)'      => 'wp-content/themes/robotheme/css/$1',
    'js/(.*)'       => 'wp-content/themes/robotheme/js/$1',
    'images/(.*)'      => 'wp-content/themes/'.$theme_name.'/images/$1',
  );
  $wp_rewrite->non_wp_rules += $roots_new_non_wp_rules;
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