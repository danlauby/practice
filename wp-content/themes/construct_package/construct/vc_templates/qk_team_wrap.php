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
 * @var $this WPBakeryShortCode_qk_team_wrap
 */
$class = '';
$output = $after_output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );


?>

<div class="team-box owl-wrapper <?php echo esc_attr($class); ?>">
	<div class="owl-carousel" data-num="3">
		<?php echo wpb_js_remove_wpautop($content); ?>
	</div>
</div>
