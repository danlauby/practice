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
 * @var $this WPBakeryShortCode_qk_portfolio
 */
$order = $filter = '';
$output = $after_output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );


$args = array('post_type' => 'portfolio', 'posts_per_page' => $order);
$portfolio = new WP_Query($args);
?>

<div class="portfolio-box owl-wrapper">
	<div class="owl-carousel" data-num="4">
	
		<?php $i=1; while($portfolio->have_posts()) : $portfolio->the_post(); ?>
	
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
									
										
										if($i==1){
											$item_skill .= $term->name;
										}else{
											$item_skill .= ', '.$term->name;
										}
										
									
							$i++; }
							echo esc_html($item_skill);
						?></span>
					</div>
				</div>
			</div>
		</div>

	<?php endwhile;?>

	</div>
</div>

