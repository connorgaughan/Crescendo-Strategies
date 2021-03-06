		<footer>
			<?php
				// Set up contact variables for the footer
				$yesToFooter 					= get_field('include_footer');
				$yesToTestimonial 		= get_field('include_a_testimonial');

				$contact							= get_field('contact_content', 'option');
				$hpFooterContent 			= get_field('homepage_contact_content', 'option');

				$yesToBlogPost 				= get_field('include_featured_blog_post');
				$blogPost 						= get_field('featured_blog_post', 'option');

				$yesToVideoBackground = get_field('include_video_background', 'option');
				$videoPoster 					= get_field('video_poster', 'option');
				$videoMP4  						= get_field('video_mp4', 'option');
				$videoWebm 						= get_field('video_webm', 'option');
				$contactBackground 		= get_field('contact_background', 'option');

				$modalTitle 					= get_field('modal_title', 'option');
				$modalForm 						= get_field('modal_form', 'option');
				$modalLink 						= get_field('modal_link', 'option');

				$ourExpertiseTitle 		= get_field('oe_title');
				$ourExpertiseContent 	= get_field('oe_intro');

				$obTitle 							= get_field('ob_title');
				$obContent 						= get_field('ob_content');
				$obImage 							= get_field('ob_image');
				$obLink 							= get_field('ob_link');


			// If the template includes the a blog post
			if($yesToBlogPost) {?>

				<?php if($blogPost)
					// override $post to include the blog post object
					$post = $blogPost;
					setup_postdata( $post );
				{ ?>

				<article class="row post">
					<div class="container">
						<?php if(is_front_page()){ ?>
						<div class="blog-intro">
							<h2><?php print $ourExpertiseTitle; ?></h2>
							<?php print $ourExpertiseContent; ?>
						</div>
						<?php } ?>
						<?php if(has_post_thumbnail() ) { ?>
						<div class="post-image">
							<?php the_post_thumbnail(); ?>
						</div>
						<div class="post-content">
							<h3><?php the_title(); ?></h3>
							<?php the_excerpt(); ?>
							<a class="button primary" href="<?php the_permalink();?>">Continue Reading</a>
							<a class="button secondary" href="<?php bloginfo('url'); ?>/our-expertise">View All</a>
						</div>
						<?php } else { ?>
						<div class="row-padded center">
							<h3><?php the_title(); ?></h3>
							<?php the_excerpt(); ?>
							<a class="button primary" href="<?php the_permalink();?>">Continue Reading</a>
							<a class="button secondary" href="<?php bloginfo('url'); ?>/our-expertise">View All</a>
						</div>
						<?php } ?>
					</div>
				</article>

				<?php } wp_reset_postdata(); ?>

			<?php }
			// If the template includes the contact/testimonial blocks
			if($yesToFooter) { ?>

			<section class="contact">
				<?php if($yesToTestimonial) {
					$testimonial 					= get_field('select_a_testimonial');

					if($testimonial)
						$post = $testimonial;
						$testimonialContent 			= get_field('content');
						$testimonialPosition 			= get_field('position');
						setup_postdata( $post );
					{ ?>

					<div class="row purple">
						<div class="container">
							<div class="testimonial">
								<p class="testimonial-content"><?php echo $testimonialContent; ?></p>
								<span class="testimonial-attribute">&mdash; <?php the_title(); ?> <?php print $testimonialPosition; ?></span>
							</div>
						</div>
					</div>

					<?php } ?>
				<?php }
				// If the contact content is filled out in the Makespace Options page
				if($contact) { ?>

				<?php if(is_front_page()){?>
				<section class="overflow row purple no-bottom">
					<div class="container">
						<div class="overflow_image">
							<img src="<?php print $obImage; ?>" alt="<?php print $obTitle; ?>" />
						</div>
						<div class="overflow_content">
							<h2><?php print $obTitle; ?></h2>
							<?php print $obContent; ?>
							<a class="button primary" href="<?php print $obLink; ?>">Learn More</a>
						</div>
					</div>
				</section>
				<?php } ?>

				<div class="row contact-content <?php if($yesToVideoBackground){?> video-container <?php }?> <?php if(is_front_page()){ print 'home'; } ?>" <?php if($videoPoster){ ?>style="background-image: url('<?php print $videoPoster; ?>');"<?php } else if(!$yesToVideoBackground) { ?> style="background-image: url('<?php print $contactBackground; ?>');" <?php } ?>>
					<div class="container">
						<div class="contact-content_copy">
							<?php if(is_front_page()) { print $hpFooterContent; } else { print $contact; } ?>
						</div>
					</div>
					<?php if($yesToVideoBackground){ ?>
		      <video muted autoplay loop poster="<?php if($videoPoster){print $videoPoster;} ?>">
		      	<?php if($videoWebm) { ?><source src="<?php print $videoWebm; ?>" type='video/webm;codecs="vp8, vorbis"'><?php } ?>
		      	<?php if($videoMP4) { ?><source src="<?php print $videoMP4; ?>" type='video/mp4;codecs="avc1.42E01E, mp4a.40.2"'><?php } ?>
		      </video>
		      <?php } ?>
				</div>

				<?php } ?>

			</section>

			<?php } ?>

			<section class="row copyright">
				<div class="container">
					<div id="copyright-notice">
						<nav>
							<ul>
								<li><span id="copyright">&copy;<?php echo date( 'Y' ); ?>. <?php bloginfo( 'name' ); ?>.</span></li>
								<li><a href="<?php echo home_url( 'privacy-policy' ); ?>" title="Privacy Policy">Privacy Policy</a></li>
								<li><a href="<?php echo home_url( 'site-info' ); ?>" title="Site Info">Site Info</a></li>
								<li><a href="<?php echo home_url( 'site-map' ); ?>" title="Site Map">Site Map</a></li>
							</ul>
						</nav>
					</div>
					<a href="https://www.makespaceweb.com" title="Louisville Web Design" id="makespace-bee" target="_blank">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 217.9 174.7" aria-label="Makespace logo">
							<path d="M207.2 12.6c-1.7 1.6-3.6 3.4-5.6 4.5-.4.2-7 4.6-8.2 5.3-.9.5-1.8 1-2.6 1.6-2.1 1.4-4.5 2.4-6.8 3.4-1.7.8-3.4 1.8-5.2 2.2-.7.2-11.1 5.2-12.8 5.9.6.6 6.5 3.2 10.6 7.1 1.3-1.6 7.7-12.7 8.5-13.4.6 0 1-.1 1.5-.2.2-1.2 1.7-1.6 2.8-1.1.3.2.5.6.8.9.9.8 6.3 3.8 7.1 4.1 1.8.8 3.7 1.4 5.4 2.5 1.3 0 2.1.5 2.7 1.3 1.6 1.5 5.8 3.3 6.8 4 .1 3 .1 6.9-.1 9.8-.4.1-.4.6-.8.6-.5 0-.4-.4-.8-.8-.2-.3-.7-.6-.8-.8-.2-.9.4-1.1.6-1.8.2-1.2-.8-3.8-.3-5.4-.3-.3-5.3-3.2-6.3-3.6-1-.4-1.7-1.1-2.6-1.7-1.2-.8-8-3.9-8.6-4.2-1-.5-1.3-.9-2.4-1-.5 0-1-.1-1.5-.2-.1 0-1.2-.6-1.1-.7-.8.5-2.8 3.6-3.4 4.5-.4.6-5.7 8-5.4 9.5.4 1.4 1.9 2.7 2.4 4.1.6 1.6.7 3.4.6 5.1-.1 1.9-.7 3.7-1.4 5.5-.6 1.6-1.8 2.9-2.5 4.3-1 2-2.3 3.6-4.9 4-1.1 1.2-2.2 2.4-2 4.9.6 1.4 1.8 4.5 3.7 5.3 3.2 0 5.7-2.9 8.4 0 2 0 3.5-1.2 4.4-2.5 1.5-.8 3-1.5 4.6-1.9.5.5 1.1.9 1.9 1.1 1.3 2.2 3 4 4.5 5.9 0 .2 0 .5.1.7 2.7 3.1 4 7.5 6.1 11 0 2.2 1.3 3.3 1.2 5.7-.3.3-.8.5-1.4.5-.1 1.1.9 1.1 1.3 1.8-.1 1.4.2 3.1-.6 3.7-.4.3-.5 2.7-.6 3.2-.2.9-.6 1.8-.8 2.8-.8 2.9-2 5.6-3.1 8.4-.1.4-.2 1.3-.5 1.6-.3.3-.7.2-1.1.3-.2 1.6.7 3.8-.3 4.9.2.9.1 2.2-.4 2.7.2 1 .6 1.8.7 2.9.4 1.1 1.8 1.1 1.8 2.6.4.3 2 3.1 2.7 3.8.4 2.6 2.8 3.3 4 5.1-.4 1-1.5.2-2.2.2-.6.1-1.4.8-1.5 1.6-1.2-1.7-.5-5.3-2.2-6.4-.1-1.3-2.4-4.4-3.2-5-.7.3-1.1 1-1.5 1.6-.6-.8-.3-1.9-.7-2.8-.4-.8-1.2-1.6-1.8-2.2-.4-.4-.7-.5-1.1-1-.7-.9-1.4-2.5-1.4-3.6 0-.3.2-.7.3-1 0-.3-.3-.7-.3-1.1 0-.6.6-1 .4-2.1-.1-.5-.5-.9-.5-1.4.1-1.6.8-3.1.9-4.7.2-3.2-.3-6.6-.9-9.7-.2-1.1-1.3-3.4-1-4.5.1-.3.5-.4.6-.7 0-.5-.3-.8-.8-.9-1.4.6-1.1 3-1.6 3.1-.3-1.8-.3-4.2.9-4.9-.6-3.8-1.9-6.7-3.2-9.8-.8-.4-.5-2.7-1.7-2.6-.7 1.3-3.6 3.4-4.9 4.5-1.2-.7-1.8-.3-3-.8-1.3-.6-2-3-3-3.1-1.5-.1-4.2 2.6-6.1 2.4-.4-.1-.9-.4-1.4-.5-.8-.2-1.7-.4-1.7-1.6-.7-.1-.6.6-1.3.6-1.1-1.1-1.4-2.8-2.3-4.1.1.2-4.4 2.9-4.7 3.1-.4.2-6.6 3.6-6.7 3.4.4 3.4 1.3 6.9 1.7 10.4.8 6.8 4.2 12.3 3.6 16.9 0 .3-.2.8-.3 1.1-.4.8-1.1 1.3-.3 2.2 0 .6.8 2.5.9 3.1.1.2-.1.6 0 .8.1.3.6.8.8 1 1.4.9 3.9.7 4.8 1.9.8.2 1.8.3 2.7.2.2 1 .4 2.9-.1 3.8-.8-.7-1.4-1.7-2-2.7h-.8c-.7-.8-4.1-2-5.1-1.9-.2-.7-.5-1.2-.8-1.8-1.7-.2-2.2-3.7-2.2-4-.7-.9-1.8-1.1-2.4-2-1.3-2.1-1.4-3.9-1.6-5.2-.6-3.2-1.5-7.3-1.9-10.4-.1-.6-.3-3.6-.8-3.8-.7-.3-.8-6.2-1-7.5-4 1-9.5 1.1-13.6.2 1.2 2.3 2.5 5.1 4.4 6.9.6 2.8 2.1 4.7 3.3 6.9 0 .3-.1.4-.1.6.3.7.8 1.3 1.1 2.2.8 2.2-.1 5.3.9 7.4.3.6.9 1.1.8 1.9-.7-.1-.9-.6-1.2-1.1-.4-.1-1-.1-1.4-.3 0-2.8-.9-5.4-.5-7.9-.2-.7-.5-1.8-.6-2.4-.9.2-2.1-4.1-3-6.2h-.8c-1.2-1.6-9-11.7-9.7-12.1-.4.1-.5.5-.8.8-.5 2.7-.9 5.4-.8 8.6-.1.3-.5.3-.6.7-.1.5.1.8.2 1.3-.2.5-1.4 3.3-2.7 3.4-.5 0-2.1 2.4-2.4 2.9-.7 1-3 2.5-4.1 2.9 3.5 3.9 5.5 6.9 6.1 7.8.9 1.5 3.2 5.9 3.7 6.5 1.8 2.2 3.1 4.8 4.6 7.2 1 1.7 3.1 2 3 4.6 1.2 0 1.9.6 2.8.8 2 2.9 5.8 4.5 8.8 5.9 2.2 1 3.3 3.3 3.1 5.7-.2 1.6-1.6 2.7-2.1 3.8-.4.8 2 1.3 2.4 1.4 1 .3 3.4 1.8 3.9 2.3.5.5 2.6 2.4 3 3.3.4 1 .8 2.5.9 3.6.1 1.1.7 1.4 1 2.2.3.8.1 1.7.5 2.5.6 1.3 1.1 2.7 2 3.8.9 1 2.2 1.6 2.7 2.9-.7.4-1.5.6-2.4.8-.4.9-1.2 1.4-1.5 2.3-1.1-1.5-.9-3.6-1.2-5.3-.2-1.6-.8-3.8-1.5-5.2-.4-.8-.8-1.2-1-2.1-.3-1.3-.5-3.1-1.2-4.3-.7-1.3-2.1-2.8-3.4-3.5-.8-.4-3.3-1.8-3.8-2.2-.6-.5-1.5-.8-2.2-1.2-.7.4-1.2 1.3-2.1 1.5-1 .2-2-.2-3.3 0-.9.1-3.1-1.6-3.9-2.1-1.5-1-2.8-2.1-4.3-2.9-1.6-.9-3.1-1.7-4.6-2.7-.6-.4-1.4-.8-1.8-1.4-.5-.6-.3-1.4-.8-2-.8 0-1.7.9-2.8.6-.6-.2-.8-.6-1.3-1-.7.2-1.3.7-2.1.4-.4.4-.3 1.2-.3 1.9-1 .3-1 1.6-1.3 2.4-.4 1.1-1 2.2-1.7 3.1-.8.9-1.7 1.3-2.6 1.9-1 .6-2.1 1.6-2.8 2.5-.4.6-3 2-2.8 2.8.1.6-.9 2-1.4 2.3 0-.4.2-1.1-.2-1.6-.5-.7-1.6-.8-2.3-1.2.3.2 3.1-1.5 3.5-1.8.9-.6 2-1.5 2.8-2.2.4-.3.4-.9.7-1.2.4-.4 2-1.4 2.3-1.6 1.6-.9 2.1-1.9 2.9-3.6.3-.6.8-.9 1.1-1.6.3-.7-.1-1.6.6-2.2-.3-1-.6-1.8-1.2-2.5-.2-.3-3.6-5.7-4.1-7.4-.1-.2-.5-.1-.6-.3-2.7-4.8-1.6-14-1.5-14.4.2-1.3.5-2.5.7-3.8-.1-.4-.7-.3-.9-.6-.6-1.1.5-3 .9-4.1.2-.8 1.3-3.1 2.1-3.3.3-1.6.5-3.3.6-5.2 1.1-.5 6.4-3.5 7.7-4.8-.2-.6-.6-.8-.8-1.3v-3.1c-1.6.2-3.3 1.7-4.3 2.9-1.6 1.9-3.3 3.3-5.2 4.8-.9.7-3.9 3.2-6.6 4.9-2.7 1.8-3.4 3.3-5.4 4.9-3.1 2.4-8.5 4.8-10.7 6.1-.9.5-2.6 2.4-4.8 3.7-3.2 1.8-7.1 3-8.6 3.5-2.4 1-4.6 2.4-7.1 3.2-5.2 1.9-11 1.1-15.8-1.7-1.6-.9-3.9-2.2-4.7-4-1-2.1-1-5.9-1-8.3 0-1.3.7-4.8 1-7.9.4-3.4-.3-3.2 0-5 .3-2.4 2.3-8.1 2.9-9.8.6-1.5 1.3-5.1 2-6.6 1.4-3.2 2.8-6.2 4.6-9.2 1.8-2.9 3.9-5.7 5.8-8.5s4.1-5.4 6.5-7.8c1.4-1.4 3.1-2 4.7-3 1.5-1 2.9-2.1 4.7-2.7.8-.3 1.7-.5 2.5-.8.3-.1 1.8-1.3 2-1.3-2.9-.5-5.8-.3-8.8 0-2.3.2-4.8.1-6.9.2-4.9.3-9.8 0-14.6-.2-1.2-.1-2.4-.2-3.5-.3-1.4-.2-2.5-.4-4.1-.7-2.5-.4-4.6-1.5-6.3-2.8-7.4.8-15.8.1-21.2-2.2-1.2-.5-2.5-.8-3.7-1.4-6.8-3.4-8.3-7.2-9.1-9.6-.8-2.4-.9-3.9.3-6.2.8-1.5 2.9-2.8 4.5-3.1 2.5-.4 4.9-.8 7.3-1.5 1.6-.5 3.7-.5 5.4-.7 4.2-.4 8.3-.9 12.6-.9 4.3 0 8.5.1 12.8.5 2.3.2 4.5.4 6.8.7 4.5.6 8 1.3 12.1 2.1 9.5 1.9 18.8 5.1 27.8 8.8 2.6 1.1 5.1 2.2 7.7 3.3 1.4.6 2.7 1.4 4 2.1.6.3 6.5 3.7 6.7 3.8 3 .1 13.7 2.5 14.4 2.8 3.5.2 10.5-3.1 18.5-3 .2-.2 1-3.2 4.8-4.8 1.9-.6 4.1-1.5 6.8-1 .5-4.5-1-8.9-1.4-13.3-1.1-.2-8.1 4.2-8.5 4.6-.3.2-.5.8-.8 1.1-.4.4-1 .6-1.2.9-.1.2 0 .6-.1.8-.1.4-1.4 3.2-2.2 3.9v2.6c-.9.3-1.5.8-2.2 1.3-.3-.4-.6-.9-.7-1.3-.3-1.4.9-1.9 1.3-2.8 0-1.4 1.2-3.7 1.3-3.9.5-.7.7-1.7 1.2-2.5.4-.8.7-.8 1.4-1.3.4-.3 7.5-4.5 7.9-4.9.2-1 .7-1.7 1.5-2 .8-.3 2 .2 2.5 1.3-.3 1.4.6 2 1 2.8.9 1.7.7 3.6.7 6.2s.8 5.1 1.8 6.9c.6-.2 1.4-.1 1.9-.3 1.3-.5 6.7-5.3 9.9-7.9 14.1-11.8 31.3-21.2 38-24.3 2.9-1.3 6.9-2.2 10.7-1.4 2.1 1.2-.2 2.9-1.2 4-.2.7-7.6 7.6-8.5 8.5zm-14.9 64.2c-.3.6-3.2 2.5-3.5 2.8-.8.7-1.1.7-.9 2 .3.7 1.2.9 1.3 1.8 3.1 1.7 7.2 9.3 7 10.8.9.8.9 2.4 1 3.9-.2.3-.7.2-.8.6.1.5.4.7.5 1.2.3 1.1 0 2.2-.1 3.3-.1.9 0 1.9 0 2.8-.2 4.8-1.5 9.3-2.1 13.6-.4.3-1 .4-1.3.8.5 1.2-.3 1.9-.4 2.8-.1.6.2 1.1.1 1.9 0 .2-.5-.1-.3.3.5 2.5 2 4 4.5 4.5-.2-2.3 0-4-.3-5.9 1.2-.8.5-3.5.7-5.3.7-.5 1.4-3.9 1.6-4.7.9-3.6.9-8.6 2.3-11.6.5.1.7-.1.9-.3.7-1.2-.6-2.1-.1-3.2-.4-.4-1-.4-1.5-.7-.3-.2-.3-.6-.8-.6-1.3 0-.5 3-1.2 4-.8-1.4-.8-3.2-.3-4.4.1-.4.8-1.6.9-2 .3-1.4-1.1-4.7-1.8-5.4-.5-1.9-.9-3.8-1.4-5.7-.8-2.7-2.1-5.4-3.3-7.6-.1.3-.4.3-.7.3z"></path>
						</svg>
					</a>
					<?php wp_nav_menu( array(
						'container' => 'div',
						'container_class' => 'social-links',
						'theme_location' => 'social'
					) ); ?>
				</div>
			</section>
		</footer>

		<div class="book">
			<button href="<?php bloginfo('url'); ?>/our-books" data-mfp-src="#book-modal" class="book-image"><img src="<?php echo get_stylesheet_directory_uri(); ?>/_app/images/book.png" alt="Our Books"/></button>
			<div id="book-modal" class="white-popup mfp-hide book-modal-content">
			  <h3><?php print $modalTitle; ?></h3>
			  <?php echo do_shortcode(''.$modalForm.''); ?>
			  <a href="<?php echo bloginfo('url'); ?>/our-books">Rather a physical copy of the book? Get one here</a>
			 </div>
		</div>
		<?php wp_footer(); ?>
	</body>
</html>