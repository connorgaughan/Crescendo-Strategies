<?php
/**
 * Template Name: Blog
 * Selectable from the dropdown menu on the edit page screen.
 */
?>

<?php get_header(); ?>

<?php
	$blogTitle 		= get_field('blog_title');
	$blogContent 	= get_Field('blog_content');
?>

	<main class="content">
		<section class="row intro white left">
			<div class="row-content container">
				<?php msw_breadcrumbs(); ?>
				<h1><?php print $blogTitle; ?></h1>
				<?php print $blogContent; ?>
			</div>
		</section>
		<section class="posts">
		<?php while( have_posts() ): the_post(); ?>
			<article class="row post">
				<div class="container">
					<?php if(has_post_thumbnail() ) { ?>
					<div class="post-image">
						<?php the_post_thumbnail(); ?>
					</div>
					<div class="post-content">
						<h3><?php the_title(); ?></h3>
						<?php the_excerpt(); ?>
						<a class="button primary" href="<?php the_permalink();?>">Continue Reading</a>
					</div>
					<?php } else { ?>
					<div class="row-padded center">
						<h3><?php the_title(); ?></h3>
						<?php the_excerpt(); ?>
						<a class="button primary" href="<?php the_permalink();?>">Continue Reading</a>
					</div>
					<?php } ?>
				</div>
			</article>
		<?php endwhile; ?>
		</section>
	</main>

<?php get_footer();