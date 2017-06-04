<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $order
 * @var $filter
 * @var $content - shortcode content
 * Shortcode class
 * @var $this WPBakeryShortCode_qk_news
 */
$order = $filter = '';
$output = $after_output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );


$args = array('post_type' => 'post', 'posts_per_page' => $order);
$portfolio = new WP_Query($args);
?>

<div class="news-box owl-wrapper">
	<div class="owl-carousel" data-num="4">
	
		<?php $i=1; while($portfolio->have_posts()) : $portfolio->the_post(); ?>
	
		
			<div class="item news-post">
				<div class="news-gallery">
					<?php if(has_post_thumbnail()){ ?>
					<?php $url = construct_thumbnail_url(''); $params = array( 'width' => 400, 'height' => 280, 'crop' => true );?>
					<img src="<?php echo  $url; ?>" alt="<?php the_title(); ?>">
					<?php }else{  ?>
					<img src="http://placehold.it/400x280" />
					<?php } ?>
					<div class="date-post">
						<p><?php the_time('M'); ?> <span><?php the_time('d'); ?></span></p>
					</div>
				</div>
				<div class="news-content">
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<p><?php echo  construct_excerpt($limit = 20); ?></p>
					<a href="<?php the_permalink(); ?>"><?php esc_html_e('Read More', 'construct'); ?> <i class="fa fa-angle-right"></i></a>
				</div>
			</div>
		<?php endwhile; ?>
	</div>
</div>

