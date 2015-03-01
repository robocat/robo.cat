<?php

get_header();

$himage = rk_post_header_image();
$style = "";

if (!empty($himage)) {
	$style = " style=\"background-image: url('$himage');\"";
}

if(have_posts()) : the_post();

?>

<div class="header-container cont single-post-header" id="header-container"<?php echo $style; ?>>
	<nav class="navigation">
		<div class="navigation-inner">
			<div class="left">
				<a href="#header" class="robocat" id="nav-home">
					<?php rk_img("navigation-robocat-logo.png"); ?>
				</a>
			</div>
			<div class="right">
				<a href="#products" id="nav-products">Products</a>
				<a href="#team" id="nav-team">Team</a>
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

	<header class="post-header int">
		<h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permalink"><?php the_title(); ?></a></h2>
		<?php rk_post_tagline(); ?>
	</header>
</div>

<div class="adventures-container cont">
	<div class="adventures int">
		<div class="posts single-post">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<hr>

				<?php the_content(); ?>
			</article>
		</div>
	</div>
</div>


<?php 

endif;

get_footer();

?>