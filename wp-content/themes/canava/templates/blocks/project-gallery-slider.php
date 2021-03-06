<?php
/**
 * WARNING: This file is part of the theme. DO NOT edit
 * this file under any circumstances.
 */

/**
 * Prevent direct access to this file
 */
defined( 'ABSPATH' ) or die();

$project_media_items = get_post_meta( $post->ID, '_project_media', true );
$project_media_items = is_array( $project_media_items ) ? $project_media_items : array();

$classes = apply_filters( 'projects/gallery-class', array( 'project-gallery', 'project-gallery-slider' ) );
$classes = array_filter( $classes );
$classes = array_unique( $classes );
?>

<div class="<?php echo esc_attr( join( ' ', $classes ) ) ?>">
	<div class="project-gallery-items flexslider">
		<ul class="slides">

			<?php foreach ( $project_media_items as $item ): ?>
				<li class="project-media-item">
					<?php

						$attachment_image = wp_get_attachment_image_src( $item['id'], 'full' );
						$attachment_image_src = $attachment_image[0];

					?>
					<a href="<?php echo esc_url( $attachment_image_src ) ?>" data-lightbox="nivoLightbox" data-lightbox-gallery="<?php echo esc_attr( get_the_ID() ) ?>">
						<?php echo wp_get_attachment_image( $item['id'], 'full' ) ?>
					</a>
				</li>
			<?php endforeach ?>

		</ul>
	</div>
</div>
