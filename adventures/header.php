<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php rk_site_title(); ?></title>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="<?php rk_site_description(); ?>">

        <meta name="og:title" content="<?php rk_meta_title(); ?>" />
        <meta name="og:site_name" content="Robocat" />
        <meta name="og:app_id" content="1551148495160059" />
        <meta name="og:url" content="<?php rk_meta_permalink(); ?>" />
        <meta name="og:description" content="<?php rk_meta_description(); ?>" />
        <meta name="og:image" content="<?php rk_meta_image(); ?>" />
        <meta name="og:locale" content="en_US" />
        <meta name="og:type" content="website" />

        <script src="//use.typekit.net/xtg1xvo.js"></script>
        <script>try{Typekit.load();}catch(e){}</script>
    	
        <link rel='stylesheet' href='<?php rk_theme_url("css/main.css"); ?>'>
    
        <link rel="image_src" href="<?php rk_theme_url("apple-touch-icon.png"); ?>" /> 
        <link rel="shortcut icon" href="<?php rk_theme_url("favicon.ico"); ?>" />
        <link rel="apple-touch-icon" href="<?php rk_theme_url("apple-touch-icon.png"); ?>" />

        <?php wp_head(); ?>
    </head>
    <body>
       <div class="container">
