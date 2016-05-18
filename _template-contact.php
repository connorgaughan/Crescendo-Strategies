<?php
/**
 * Template Name: Contact
 * Selectable from the dropdown menu on the edit page screen.
 */
?>

<?php get_header(); ?>

<?php
	$directContact 	= get_field('direct_contact_details');
	$contactForm   	= get_field('contact_form');
	$contactIntro		= get_field('contact_intro_content');
?>

	<main class="content">
		<section class="row intro white left">
			<div class="row-content container">
				<?php msw_breadcrumbs(); ?>
				<h1><?php the_title(); ?></h1>
				<?php print $contactIntro; ?>
			</div>
		</section>
		<section class="white contact-form">
			<div class="row-column container">
				<div class="row-column_left">
					<?php print $directContact; ?>
				</div>
				<div class="row-column_right">
					<h4>How can we help your organization?</h4>
					<?php echo do_shortcode(''.$contactForm.''); ?>
				</div>
			</div>
		</section>
	</main>

<?php get_footer(); ?>