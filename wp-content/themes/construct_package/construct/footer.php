<?php global $construct_options; ?>
		<footer>
			<?php if($construct_options['footer-widgets']=='yes'){ ?>
			<div class="container">
				
				<div class="footer-widgets">
					<div class="row">
						<div class="col-md-3">
							<?php 
							
							if(is_active_sidebar('footer-1')){
								dynamic_sidebar('footer-1'); 
							}
							
							?>	
						</div>
						<div class="col-md-3">
							<?php 
							
							if(is_active_sidebar('footer-2')){
								dynamic_sidebar('footer-2'); 
							}
							
							?>	
						</div>
						<div class="col-md-3">
							<?php 
							
							if(is_active_sidebar('footer-3')){
								dynamic_sidebar('footer-3'); 
							}
							
							?>	
						</div>
						<div class="col-md-3">
							<?php 
							
							if(is_active_sidebar('footer-4')){
								dynamic_sidebar('footer-4'); 
							}
							
							?>	
						</div>

					</div>
				</div>
			</div>
			<?php } ?>
			<div class="last-line">
				<div class="container">
					<p class="copyright">
						<?php echo wp_kses_post($construct_options['footer-text']); ?>
					</p>
				</div>
			</div>
		</footer>
		<!-- End footer -->

	</div>
	<!-- End Container -->
	
	<?php wp_footer(); ?>

</body>
</html>