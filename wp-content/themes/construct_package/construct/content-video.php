<div <?php post_class('blog-post'); ?>>
	<?php 
		if(function_exists('the_field')){
			echo do_shortcode(get_field('video_intro'));
		}
	?>
	<!-- End youtube -->
	<div class="post-content-text">
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<span><?php the_time(get_option( 'date_format' )); ?></span>
		<p><?php echo construct_excerpt($limit = 30); ?></p>
		<a href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','construct'); ?> <i class="fa fa-angle-right"></i></a>
	</div>
</div>