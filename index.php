<?php get_header(); ?>

	<main class="content">
		<section class="row intro white left">
			<div class="row-content container">
				<?php msw_breadcrumbs(); ?>
				<?php
					if( get_option( 'page_for_posts' ) ) {
						$posts_page = get_page( get_option( 'page_for_posts' ) );
						$blogTitle = apply_filters( 'the_title', $posts_page->post_title );
					}
				?>
				<h1><?php print $blogTitle; ?></h1>
				<div class="category-dd select-wrapper">
					<?php wp_dropdown_categories( array(
						'show_option_none' => is_category() ? 'View All' : 'Filter'
					) ); ?>
					<script type="text/javascript">
					var dropdown = document.getElementById("cat");
					function onCatChange() {
						if ( dropdown.options[dropdown.selectedIndex].value > 0 ) {
							location.href = "<?php echo esc_url( home_url( '/' ) ); ?>?cat="+dropdown.options[dropdown.selectedIndex].value;
						} else {
							location.href = "<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>";
						}
					}
					dropdown.onchange = onCatChange;</script>
				</div>
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