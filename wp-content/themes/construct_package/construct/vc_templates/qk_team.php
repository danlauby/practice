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
 * @var $this WPBakeryShortCode_qk_team
 */
$title = $sub_title = $link = $icon = '';
$output = $after_output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );


?>

<div class="item team-post">
  <div class="gallery-team">
    <?php
      $img = wp_get_attachment_image_src($image,'full');
      $img = $img[0];
    ?>
    <img src="<?php echo esc_attr($img); ?>" alt="Slide" class="img-responsive">

    <ul class="social-list">
      <?php if($facebook!=''){ ?>
      <li><a class="facebook" href="<?php echo esc_attr($facebook); ?>"><i class="fa fa-facebook"></i></a></li>
      <?php } ?>
      <?php if($twitter!=''){ ?>
      <li><a class="twitter" href="<?php echo esc_attr($twitter); ?>"><i class="fa fa-twitter"></i></a></li>
      <?php } ?>
      <?php if($google!=''){ ?>
      <li><a class="google" href="<?php echo esc_attr($google); ?>"><i class="fa fa-google-plus"></i></a></li>
      <?php } ?>
      <?php if($linkedin!=''){ ?>
      <li><a class="linkedin" href="<?php echo esc_attr($linkedin); ?>"><i class="fa fa-linkedin"></i></a></li>
      <?php } ?>
    </ul>
  </div>

  <div class="team-content">
    <h2><?php echo esc_html($name); ?></h2>
    <span><?php echo esc_html($job); ?></span>
    <p><?php echo wpb_js_remove_wpautop($content); ?></p>
  </div>

</div>

