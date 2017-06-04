
<?php
/**
 * Search Form Template
 *
 */
?>

	<div class=" search-widget">
		<form method="get" class="searchform" action="<?php echo esc_url( home_url('/') ); ?>" >
			<input type="text" name="s" placeholder="<?php esc_attr_e( 'Search...', 'construct' ); ?>" />
			
		</form>
	</div>