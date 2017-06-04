<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $class
 * @var $content - shortcode content
 * Shortcode class
 * @var $this WPBakeryShortCode_qk_testimonial
 */
$class = '';
$output = $after_output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

wp_enqueue_script("construct-bxslider", get_template_directory_uri()."/js/jquery.bxslider.min.js",array(),false,true);
wp_enqueue_style( 'construct-bxslider', get_template_directory_uri().'/css/jquery.bxslider.css');

?>

<div class="testimonial-box <?php echo esc_attr($class); ?>">
	<ul class="bxslider">
		<?php echo wpb_js_remove_wpautop($content); ?>
	</ul>
</div>
