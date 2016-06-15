<?php get_header(); ?>

<?php
	$icon 								= get_field('page_icon');
	$toutTitle						= get_field('tout_title');
	$toutSubHeadline			= get_field('tout_sub_headline');
	$toutIcon							= get_field('tout_icon');
	$toutBackgroundImage	= get_field('tout_background_image');
	$toutCopy							= get_field('tout_copy');
	$toutLink							= get_field('tout_link');
?>

	<main class="content">
		<?php while( have_posts() ): the_post(); ?>
			<section class="row intro white left">
				<?php if($icon) { ?>
				<div class="row-content container">
					<?php msw_breadcrumbs(); ?>
					<div class="row-content_icon">
						<img src="<?php print $icon; ?>" />
					</div>
					<div class="row-content_copy">
						<h1><?php the_title(); ?></h1>
						<?php the_content(); ?>
					</div>
				</div>
				<?php } else { ?>
				<div class="container">
					<?php msw_breadcrumbs(); ?>
					<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>
				</div>
				<?php } ?>
			</section>
		<?php endwhile; ?>



		<?php if( have_rows('content_row') ) : while ( have_rows('content_row') ) : the_row(); ?>

			<?php
				// Set up contact variables for the footer
				$yesToVideo 					= get_sub_field('include_a_video_row');
				$youtubeId 						= get_sub_field('row_video_id');
				$rowColorClass	 			= get_sub_field('row_color');
				$rowAlignmentClass		= get_sub_field('row_alignment');
				$yesToIcon 						= get_sub_field('include_an_icon');
				$rowIcon 							= get_sub_field('row_icon');
				$rowTitle 						= get_sub_field('row_title');
				$rowContent 					= get_sub_field('row_content');
				$rowLink 							= get_sub_field('row_link');
			?>

			<section class="row <?php print $rowColorClass; ?> <?php print $rowAlignmentClass; ?> <?php if($yesToVideo){ print 'video'; } ?>">
				<?php if($yesToVideo) { ?>
					<div class="row-content container" id="video">
						<button class="video-toggle" href="http://www.youtube.com/watch?v=<?php print $youtubeId; ?>">
							<img src="http://img.youtube.com/vi/<?php print $youtubeId; ?>/maxresdefault.jpg" />
						</button>
					</div>
				<?php } else if($yesToIcon) { ?>
					<div class="row-content container">
						<div class="row-content_icon">
							<img src="<?php print $rowIcon; ?>" alt="<?php print $rowTitle; ?>" />
						</div>
						<div class="row-content_copy">
							<?php if ($rowTitle) { ?>
								<h2><?php print $rowTitle; ?></h2>
							<?php } ?>
							<p><?php print $rowContent; ?></p>
							<?php if ($rowLink) { ?>
								<a class="button primary" href="<?php print $rowLink; ?>">Learn More</a>
							<?php } ?>
						</div>
					</div>
				<?php } else { ?>
					<div class="row-content container">
						<div class="row-padded">
							<?php if ($rowTitle) { ?>
								<h2><?php print $rowTitle; ?></h2>
							<?php } ?>
							<p><?php print $rowContent; ?></p>
							<?php if ($rowLink) { ?>
								<a class="button primary" href="<?php print $rowLink; ?>">Learn More</a>
							<?php } ?>
						</div>
					</div>
				<?php } ?>
			</section>

			<?php endwhile; endif; ?>

			<?php if(is_page('we-reduce-turnover') && ($toutTitle) ) { ?>

			<section class="row tout center" style="background-image: url('<?php print $toutBackgroundImage; ?>')">
				<div class="container row-padded">
					<?php if($toutSubHeadline) { ?><p class="tout-subhead"><?php print $toutSubHeadline; ?></p><?php } ?>
					<?php if($toutIcon) { ?><img class="tout-icon" src="<?php print $toutIcon; ?>" alt="<?php print $toutTitle; ?>"/><?php } ?>
					<h2 class="tout-title"><?php print $toutTitle; ?></h2>
					<?php if($toutCopy) { ?><p class="tout-copy"><?php print $toutCopy; ?></p><?php } ?>
					<?php if($toutLink) { ?><a class="button primary" href="<?php print $toutLink; ?>">Learn More</a><?php } ?>
				</div>
			</section>

			<?php } ?>
	</main>

<?php get_footer();