<?php get_header(); ?>

<div class="aboutus-container cont">
	<div class="aboutus int">
		<p>At Robocat we’ve had a habit of throwing ourselves into one fun project after another. Some would call them cases, we prefer to see them as adventures. Here we’ve chronicled a few.</p>
	</div>
</div>

<div class="adventures-container cont">
	<div class="adventures int">
		<div class="posts feed">
			<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="aside">
						<a href="<?php the_permalink(); ?>" title="Permalink" class="post-image">
	                        <?php the_post_thumbnail('large'); ?>
	                    </a>
					</div>
					<div class="content">
						<h2 class="title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permalink"><?php the_title(); ?></a></h2>
						<p class="tagline"><?php rk_post_tagline(); ?></p>

                        <a href="<?php the_permalink(); ?>" class="button dark adventure">Go on this adventure →</a>
					</div>
				</article>

			<?php endwhile; endif; ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>