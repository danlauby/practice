<?php

// Creating the widget 
class recent_post_widget extends WP_Widget {

function __construct() {

parent::__construct(
// Base ID of your widget
'recent_post_widget', 

// Widget name will appear in UI
esc_html__('QK RECENT Posts', 'construct'), 

// Widget description
array( 'description' => esc_html__( 'Listing RECENT Posts', 'construct' ), ) 
);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];

// This is where you run the code and display the output
?>

<div class="recent-widget">

  <ul class="recent-list">
	<?php 
		
		$arr = array('post_type' => 'post', 'posts_per_page' => $instance['count']);
		$query = new WP_Query($arr);
		while($query->have_posts()) : $query->the_post();
	?>
    <li>
      <?php
			if(has_post_thumbnail()){
			// Get the URL of our processed image
			$image =  construct_thumbnail_url('');
		?>
		<img  alt="<?php the_title(); ?>" src="<?php echo esc_attr($image); ?>"  class="media-object" > 
		
		<?php
			}else{
		?><img  alt="<?php the_title(); ?>" src="http://placehold.it/100x75"  class="media-object" > 
		<?php } ?>
      <div class="post-content">
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<span><?php ?><?php the_time(get_option( 'date_format' )); ?></span>
      </div>
    </li>
    <?php endwhile; ?>
	<?php wp_reset_postdata(); ?>
  </ul>

</div>

<?php

echo $args['after_widget'];
}
		
// Widget Backend 
public function form( $instance ) {

if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = esc_html__( 'Recent Posts', 'construct' );
//$count = 4;
}
if ( isset( $instance[ 'count' ] ) ) {
$count = $instance[ 'count' ];
}
else {
$count = 3;
//$count = 4;
}

// Widget admin form
?>
<p>
<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:', 'construct'); ?></label> 
<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<p>
<label for="<?php echo esc_attr($this->get_field_id( 'count' )); ?>"><?php esc_html_e( 'Number of posts:', 'construct'); ?></label> 
<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'count' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'count' )); ?>" type="text" value="<?php echo esc_attr( $count ); ?>" />
</p>
<?php 
}
	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
$instance['count'] = ( ! empty( $new_instance['count'] ) ) ? strip_tags( $new_instance['count'] ) : '';
return $instance;
}
} // Class wpb_widget ends here

// Register and load the widget
function wpb_load_widget3() {
	register_widget( 'recent_post_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget3' );
?>