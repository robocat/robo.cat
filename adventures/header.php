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
       <div class="header-container cont" id="header-container">
            <nav class="navigation">
                <div class="navigation-inner">
                    <div class="left">
                        <a href="#header" class="robocat" id="nav-home">
                            <?php rk_img("navigation-robocat-logo.png"); ?>
                        </a>
                    </div>
                    <div class="right">
                        <a href="//robo.cat/#products" id="nav-products">Products</a>
                        <a href="//robo.cat/#team" id="nav-team">Team</a>
                        <a href="//adventures.robo.cat/" id="nav-adventures">Adventures</a>
                        <a href="#get-in-touch" id="nav-getintouch">Get in touch</a>
                        <a href="#share" id="share-tw" class="twitter">
                            <?php rk_img("navigation-twitter.png"); ?>
                        </a>
                        <a href="#share" id="share-fb" class="facebook">
                            <?php rk_img("navigation-facebook.png"); ?>
                        </a>
                    </div>
                </div>
            </nav>
        </div>

