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
						<?php while(have_posts()) : the_post(); ?>
						<div class="blog-box">

							<div class="blog-post single-post">
								<?php if(get_post_format()=='video'){ ?>

								<?php 
									if(function_exists('the_field')){
										echo do_shortcode(get_field('video_intro'));
									}
								?>
								
								<?php }elseif(has_post_thumbnail()){ 

									the_post_thumbnail();

								}?>
								<div class="post-content-text">
									<h1><?php the_title(); ?></h1>
									<span><?php the_time(get_option( 'date_format' )); ?></span>
									 <?php the_content(); ?>
									  <?php
										$defaults = array(
										  'before'           => '<div id="page-links"><strong>Page: </strong>',
										  'after'            => '</div>',
										  'link_before'      => '<span>',
										  'link_after'       => '</span>',
										  'next_or_number'   => 'number',
										  'separator'        => ' ',
										  'nextpagelink'     => esc_html__( 'Next page','construct' ),
										  'previouspagelink' => esc_html__( 'Previous page','construct' ),
										  'pagelink'         => '%',
										  'echo'             => 1
										);
									   ?>
									  <?php wp_link_pages($defaults); ?>
									  <?php if(has_tag()){ ?>
										<?php the_tags('<ul class="single-post-tags"><li><span>Tags: </span> </li><li>',' </li>, <li>','</li></ul>'); ?>
									  <?php } ?> 
								</div>
							</div>

							<?php if($construct_options['blog_author']==true){ ?>

							<div class="autor-post">
								
								<img src="<?php if(function_exists('get_field')){ echo get_field('avatar', 'user_'.get_the_author_meta('ID')); }?>" alt="">
								<div class="autor-content">
									<h2><?php echo esc_html(get_the_author_meta('display_name'));?></h2>
									<span>
										<?php 
											if(function_exists('the_field')){
												the_field('your_job', 'user_'.get_the_author_meta('ID'));
											}
										?>
									</span>
									<p><?php echo esc_html(get_the_author_meta('description'));?></p>
								</div>
							</div>

							<?php } ?>

							<?php global $post; ?>
								<?php if('open' == $post->comment_status){ ?>
								<?php comments_template(); ?>
								<?php } ?>

						</div>
						<?php endwhile; ?>
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