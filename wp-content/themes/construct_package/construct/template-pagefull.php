<?php 
/*
*Template Name: Page Fullwidth
*/
?>
<?php get_header(); ?>

		<!-- page-banner-section 
			================================================== -->
		<section class="page-banner-section">
			<div class="container">
				<h1><?php single_post_title(); ?></h1>
				<?php construct_breadcrumb(); ?>
			</div>
		</section>
		<!-- End page-banner section -->
		
			<?php 

				while(have_posts()) : the_post();
					the_content(); 
				endwhile;

			?>
		
<?php get_footer(); ?>