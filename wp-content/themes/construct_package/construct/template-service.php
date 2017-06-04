<?php 
/*
*Template Name: Page Services
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

		<!-- services section 
			================================================== -->
		<section class="services-section">
			<div class="container">

				<div class="services-box">
					<div class="row">

						<div class="col-md-9">
							<?php 

								while(have_posts()) : the_post();
									the_content();
								endwhile;

							?>
							
						</div>

						<div class="col-md-3">
							<div class="services-tabs">
								<?php 
									if(is_active_sidebar('sidebar-service')){
										dynamic_sidebar('sidebar-service');
									}
								?>
								
							</div>
						</div>

					</div>
				</div>

				
			</div>
		</section>
		<!-- End services section --><!-- footer 
			================================================== -->
<?php get_footer(); ?>