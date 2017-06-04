<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $title
 * @var $image
 * @var $link
 * @var $content - shortcode content
 * Shortcode class
 * @var $this WPBakeryShortCode_qk_about
 */
$title = $sub_title = $link = $image = '';
$output = $after_output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );


?>

<div class="services-post">
	<?php
      $img = wp_get_attachment_image_src($image,'full');
      $img = $img[0];
    ?>
    <img src="<?php echo esc_attr($img); ?>" alt="Slide" class="img-responsive">
	<div class="services-content">
		<h2><?php echo esc_html($title); ?></h2>
		<?php echo wpb_js_remove_wpautop($content); ?>
		<?php if($link!=''){ ?>
		<a href="<?php echo esc_url($link); ?>">Read More <i class="fa fa-angle-right"></i></a>
		<?php } ?>
	</div>
	
</div>