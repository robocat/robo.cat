<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="{{ site.description }}">
        <meta name="keywords" content="{{ site.keywords }}">
        <title><?php rk_title(); ?></title>

        <meta name="og:title" content="<?php rk_meta_title(); ?>" />
        <meta name="og:site_name" content="Robocat" />
        <meta name="og:app_id" content="{{ site.fb.appId }}" />
        <meta name="og:url" content="<?php rk_meta_url(); ?>" />
        <meta name="og:description" content="{{ site.description }}" />
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