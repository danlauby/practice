<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $order
 * @var $cat
 * @var $filter
 * @var $content - shortcode content
 * Shortcode class
 * @var $this WPBakeryShortCode_qk_portfolio
 */
$order = $filter = $cat = '';
$output = $after_output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );


if(isset($cat) and $cat!='all'){
	$args = array('post_type' => 'portfolio', 'posts_per_page' => $order, 'tax_query' => array(
	array(
		'taxonomy' => 'portfolio_category',
		'field'    => 'slug',
		'terms'    => $cat,
	),
));
}else{
	$args = array('post_type' => 'portfolio', 'posts_per_page' => $order);
}

$portfolio = new WP_Query($args);
?>

<!-- portfolio-section 
	================================================== -->
<div class="portfolio-section">
	
		<?php if(isset($cat) and $cat!='all'){ ?>
		<?php }else{ ?>
		<ul class="filter">
			<li><a class="active" href="#" data-filter="*"><i class="fa fa-th-list"></i> All</a></li>
			<?php $portfolio_skills = get_terms('portfolio_category'); ?>
			<?php foreach($portfolio_skills as $portfolio_skill) { ?>
			<li><a href="#" data-filter=".<?php echo esc_attr($portfolio_skill->slug); ?>"><?php echo esc_html($portfolio_skill->name); ?></a></li>
			<?php } ?>
			
		</ul>
		<?php } ?>
		<div class="portfolio-box iso-call">
			
			
		<?php $i=1; while($portfolio->have_posts()) : $portfolio->the_post(); ?>
			<?php
				$item_classes = '';
				$item_skill = '';
				$item_cats = get_the_terms(get_the_ID(), 'portfolio_category');
				foreach((array)$item_cats as $item_cat){
					if(count($item_cat)>0){
						$item_classes .= $item_cat->slug . ' ';
						$item_skill .= $item_cat->name . ' | ';
					}
				}
			?>

			<div class="<?php echo esc_attr($item_classes); ?> project-post">
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

<!-- End portfolio section -->

