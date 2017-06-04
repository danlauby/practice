<?php get_header(); ?>

		<!-- page-banner-section 
			================================================== -->
		<section class="page-banner-section">
			<div class="container">
				<h1><?php esc_html_e('Our Blog','construct'); ?></h1>
				<?php construct_breadcrumb(); ?>
			</div>
		</section>
		<!-- End page-banner section -->

		<!-- blog section 
			================================================== -->
		<section class="blog-section">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<div class="blog-box">

							

							<?php 
							if(have_posts()) :
									while(have_posts()) : the_post(); 
							?>
							<?php get_template_part( 'content', ( post_type_supports( get_post_type(), 'post-formats' ) ? get_post_format() : get_post_type() ) ); ?>

							<?php endwhile; ?>
							<?php else: ?>
							<div class="not-found">
								<h1><?php esc_html_e('Nothing Found Here!','construct'); ?></h1>
								<h3><?php esc_html_e('Search with other string:', 'construct') ?></h3>
								<div class="search-form">
									<?php get_search_form(); ?>
								</div>
							</div>
							<?php endif; ?>

							
							<?php construct_pagination($prev = esc_html__('Prev','construct'), $next = esc_html__('Next','construct'), $pages=''); ?>
							

							

						</div>
						
					</div>
					<div class="col-md-4">
						<?php get_sidebar(); ?>
					</div>
				</div>
			</div>
		</section>
		<!-- End blog section --><!-- footer 
			================================================== -->
<?php get_footer(); ?>