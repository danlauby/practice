<?php
if ( ! defined( 'ABSPATH' ) ) {
  die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $name
 * @var $facebook
 * @var $twitter
 * @var $google
 * @var $linkedin
 * @var $job
 * @var $image
 * @var $content - shortcode content
 * Shortcode class
 * @var $this WPBakeryShortCode_qk_testimonial
 */
$title = $sub_title = $link = $icon = '';
$output = $after_output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );


?>

<li>
  <h2><?php echo esc_html($name); ?></h2>
    <span><?php echo esc_html($job); ?></span>
    <p><?php echo wpb_js_remove_wpautop($content); ?></p>
</li>
