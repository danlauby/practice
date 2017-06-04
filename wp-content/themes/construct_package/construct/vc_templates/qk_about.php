<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $title
 * @var $sub_title
 * @var $link
 * @var $icon
 * @var $content - shortcode content
 * Shortcode class
 * @var $this WPBakeryShortCode_qk_about
 */
$title = $sub_title = $link = $icon = '';
$output = $after_output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );


?>

<div class="about-us-post">
	<a href="<?php echo esc_url($link); ?>"><i class="fa <?php echo esc_attr($icon); ?>"></i></a>
	<h2><?php echo esc_html($title); ?></h2>
	<span><?php echo esc_html($sub_title); ?></span>
</div>