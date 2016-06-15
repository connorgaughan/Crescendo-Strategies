<?php get_header(); ?>

<?php
	$wsTitle 							= get_field('we_speak_title');
	$wsContent 						= get_field('we_speak_content');
	$wsLink 							= get_field('we_speak_link');
	$wiTitle 							= get_field('wi_title');
	$wiContent 						= get_field('wi_content');
	$otTitle 							= get_field('our_team_title');
	$otcontent 						= get_field('our_team_content');
	$otImage							= get_field('our_team_image');
	$yesToVideoBackground = get_field('include_video_background');
	$videoPoster 					= get_field('video_poster');
	$videoMP4  						= get_field('video_mp4');
	$videoWebm 						= get_field('video_webm');
	$contactBackground 		= get_field('background_image');
?>



	<main class="content">
		<?php if( have_rows('who_we_are_content') ) { ?>
		<div class="we-are-container">
			<?php while ( have_rows('who_we_are_content') ) : the_row(); ?>
				<?php
					$icon 		= get_sub_field('icon');
					$title 		= get_sub_field('title');
					$link 		= get_sub_field('link');
					$color 		= get_sub_field('color');
				?>
				<div class="we-are-container_cell <?php print $color; ?>">
					<a href="<?php print $link; ?>">
						<img src="<?php print $icon; ?>" alt="<?php print $title; ?>"/>
						<h4><?php print $title; ?></h4>
						<p class="hover-text">Learn More</p>
					</a>
				</div>
			<?php endwhile; wp_reset_postdata(); ?>
		</div>
		<?php } ?>

		<section class="my-slider row white">
				<?php if( have_rows('slide') ) { ?>
				<ul>
					<?php while ( have_rows('slide') ) : the_row(); ?>
						<?php
							// Carousel Content
							$yesToTestimonial 		= get_sub_field('testimonial');
							$testimonial 					= get_sub_field('select_a_testimonial');
							$testimonialImage     = get_sub_field('testimonial_image');

							$yesToCustom			 		= get_sub_field('custom_content');
							$customContent 				= get_sub_field('custom_content_copy');
							$customImage     			= get_sub_field('custom_content_image');
						?>
						<li>
							<div class="testimonial container">
							<?php if($yesToTestimonial) {

								if($testimonial)
									$post = $testimonial;
									$testimonialContent 			= get_field('content');
									$testimonialPosition 			= get_field('position');
									setup_postdata( $post );
								{ ?>

									<?php if($testimonialImage){ ?>
										<div class="flex">
											<div class="image">
												<img src="<?php print $testimonialImage; ?>" />
											</div>
											<div class="content">
												<p class="testimonial-content"><?php echo $testimonialContent; ?></p>
												<span class="testimonial-attribute">&mdash; <?php the_title(); ?> <?php print $testimonialPosition; ?></span>
											</div>
										</div>
									<?php } else { ?>

										<p class="testimonial-content"><?php echo $testimonialContent; ?></p>
										<span class="testimonial-attribute">&mdash; <?php the_title(); ?> <?php print $testimonialPosition; ?></span>
									<?php } ?>
								<?php } wp_reset_postdata(); ?>

							<?php } if($yesToCustom){ ?>

								<?php if($customImage){ ?>
									<div class="flex">
										<div class="image">
											<img src="<?php print $customImage; ?>" />
										</div>
										<div class="content">
											<?php print $customContent; ?>
										</div>
									</div>
								<?php } else { ?>
									<?php print $customContent; ?>
								<?php } ?>

							<?php } ?>
							</div>
						</li>
					<?php endwhile; ?>
				</ul>
				<?php } ?>
		</section>

		<section class="row white tout <?php if($yesToVideoBackground){?> video-container <?php }?>" <?php if($videoPoster){ ?>style="background-image: url('<?php print $videoPoster; ?>');"<?php } else if(!$yesToVideoBackground) { ?> style="background-image: url('<?php print $contactBackground; ?>');" <?php } ?>>
			<div class="container">
				<div class="ws-intro">
					<h2><?php print $wsTitle; ?></h2>
					<?php print $wsContent; ?>
					<a class="play-button" href="<?php print $wsLink; ?>#video">Watch Video</a>
				</div>

				<?php if( have_rows('we_speak_logo') ) { ?>
				<ul class="logo-container">
					<?php while ( have_rows('we_speak_logo') ) : the_row(); ?>
						<?php
							$logo 		= get_sub_field('logo');
						?>
						<li class="logo">
							<img src="<?php print $logo; ?>"/>
						</li>
					<?php endwhile; ?>
				</ul>
				<?php } ?>

			</div>
			<?php if($yesToVideoBackground){ ?>
	      <video muted autoplay loop poster="<?php if($videoPoster){print $videoPoster;} ?>">
	      	<?php if($videoWebm) { ?><source src="<?php print $videoWebm; ?>" type='video/webm;codecs="vp8, vorbis"'><?php } ?>
	      	<?php if($videoMP4) { ?><source src="<?php print $videoMP4; ?>" type='video/mp4;codecs="avc1.42E01E, mp4a.40.2"'><?php } ?>
	      </video>
	      <?php } ?>
		</section>

		<section class="we-influence row white center">
			<div class="row-padded container">
				<h2><?php print $wiTitle; ?></h2>
				<?php print $wiContent; ?>
			</div>
		</section>

		<section class="overflow row purple">
			<div class="container">
				<div class="overflow_image">
					<img src="<?php print $otImage; ?>" alt="<?php print $otTitle; ?>" />
				</div>
				<div class="overflow_content">
					<h2><?php print $otTitle; ?></h2>
					<?php print $otcontent; ?>
				</div>
			</div>
		</section>
	</main>

<?php get_footer(); ?>