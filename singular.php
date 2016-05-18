<?php get_header(); ?>
	<main class="content">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<section class="row intro white left">
			<div class="row-content container">
				<?php msw_breadcrumbs(); ?>
				<div class="single-post_content">
				<?php if(has_post_thumbnail() ) { ?>
					<h1><?php the_title(); ?></h1>
					<?php the_post_thumbnail(); ?>
					<?php the_content(); ?>
				<?php } else { ?>
					<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>
				<?php } ?>
				</div>
			</div>
		</section>
		<?php endwhile; endif; ?>
	</main>
<?php get_footer(); ?>