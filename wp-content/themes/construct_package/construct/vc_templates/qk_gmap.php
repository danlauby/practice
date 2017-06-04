<?php
$css = '';
extract(shortcode_atts(array(
  'image' => '',
  'zoom' => '17',
  'lat' => '51.51152',
  'lon' => '-0.125198',
  'type' => '',
  'key' => '',
), $atts));
if($key!=''){
	$key = $key;
}else{
	$key = 'AIzaSyCiqrIen8rWQrvJsu-7f4rOta0fmI5r2SI';
}
wp_enqueue_script("map_api", "https://maps.googleapis.com/maps/api/js?key=$key&amp;v=3.exp&amp;sensor=false",array(),false,true);
wp_enqueue_script("map", get_template_directory_uri()."/js/gmap3.min.js",array(),false,true);
?>
<div id="map"></div>
<?php
if($image!=''){
	$img = wp_get_attachment_image_src($image,'full');
	$img = $img[0];
	}else{
		$img = get_template_directory_uri().'/images/marker.png';
	}
?>

<script>
	(function($){
		'use strict';
		
		$(document).ready(function(){

			var contact = {"lat":"<?php echo  esc_js($atts['lat']); ?>", "lon":"<?php echo esc_js($atts['lon']); ?>"}; //Change a map coordinate here!

			try {
				var mapContainer = $('#map');
				mapContainer.gmap3({
					action: 'addMarker',
					marker:{
						options:{
							icon : new google.maps.MarkerImage('<?php echo get_template_directory_uri(); ?>/images/marker.png')
						}
					},
					latLng: [contact.lat, contact.lon],
					map:{
						center: [contact.lat, contact.lon],
						zoom: 12
						},
					},
					{action: 'setOptions', args:[{scrollwheel:false}]}
				);
			} catch(err) {

			}


	
		});
		
	})(jQuery);
</script>