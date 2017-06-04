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
		<?php while(have_posts()) : the_post(); ?>
		<!-- single-page section 
			================================================== -->
		<section class="single-page-section">
			
				<?php the_content(); ?>
			
		</section>
		<!-- End single-page section -->
		<?php endwhile;?>
		<!-- portfolio-section 
			================================================== -->
		<section class="portfolio-section">
			<div class="container">

				<div class="portfolio-box owl-wrapper">
					<div class="owl-carousel" data-num="3">
					
						<?php
							$item_cats = get_the_terms( $wp_query->get_queried_object_id(), 'portfolio_category');
							$portfolio_cats = array();
							foreach((array)$item_cats as $item_cat){
								$portfolio_cats[] = $item_cat->slug;
							}
							//print_r($portfolio_cats);
							$id = $wp_query->get_queried_object_id();
							$query = new WP_Query(array('post__not_in' => array( $id ),'post_type'=>'portfolio','posts_per_page'=>9,'tax_query' => array(array('taxonomy' => 'portfolio_category',
					'field' => 'slug','terms' => $portfolio_cats))));
						?>
						<?php while($query->have_posts()) : $query->the_post();?>
					
						<div class="item project-post">
							<div class="project-gallery">
								<?php the_post_thumbnail(); ?>
								<div class="hover-box">
									<div class="inner-hover">
										<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
										<span><?php 
											$item_skill = '';
											$terms = get_the_terms(get_the_ID(), 'portfolio_category');
												$i=1; foreach((array)$terms as $term){
													if(count($item_cat)>0){
														
														if($i==1){
															$item_skill .= $term->name;
														}else{
															$item_skill .= ', '.$term->name;
														}
														
													}
											$i++; }
											echo esc_html($item_skill);
										?></span>
									</div>
								</div>
							</div>
						</div>
						<?php endwhile; ?>

					</div>
				</div>

			</div>
		</section>
		<!-- End portfolio section --><!-- footer 
			================================================== -->
<?php get_footer(); ?>