<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<?php 
global $construct_options, $woocommerce; 
global $wp_query;

?>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
	
		<?php if($construct_options['favicon']['url']!=''){ ?>
			<link rel="icon" href="<?php echo esc_url($construct_options['favicon']['url']); ?>" type="image/x-icon">
		<?php } ?>

	<?php } ?>
  
  <?php if($construct_options['apple_icon']['url']!=''){ ?>
  <link rel="apple-touch-icon" href="<?php echo esc_url($construct_options['apple_icon']['url']); ?>" />
  <?php } ?>
  <?php if($construct_options['apple_icon_57']['url']!=''){ ?>
  <link rel="apple-touch-icon" sizes="57x57" href="<?php echo esc_url($construct_options['apple_icon_57']['url']); ?>">
  <?php } ?>
  <?php if($construct_options['apple_icon_72']['url']!=''){ ?>
  <link rel="apple-touch-icon" sizes="72x72" href="<?php echo esc_url($construct_options['apple_icon_72']['url']); ?>">
  <?php } ?>
  <?php if($construct_options['apple_icon_114']['url']!=''){ ?>
  <link rel="apple-touch-icon" sizes="114x114" href="<?php echo esc_url($construct_options['apple_icon_114']['url']); ?>">
  <?php } ?>

  <?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>

	<!-- Container -->
	<div id="container">
		<!-- Header
		    ================================================== -->
		<header class="clearfix">
			<nav class="navbar navbar-default <?php if($construct_options['body_style']=='boxed'){ ?> navbar-static-top <?php }else{ ?> navbar-fixed-top <?php } ?>" >
				<div class="top-line">
					<div class="container">
						<div class="row">
							<div class="col-md-8">
								<ul class="info-list">
									<?php if($construct_options['phone']!=''){ ?>
									<li>
										<i class="fa fa-phone"></i>
										<?php esc_html_e('Call us','construct'); ?>:
										<span><?php echo wp_kses_post($construct_options['phone']); ?></span>
									</li>
									<?php } ?>
									<?php if($construct_options['email']!=''){ ?>
									<li>
										<i class="fa fa-envelope-o"></i>
										<?php esc_html_e('Email us','construct'); ?>:
										<span><?php echo wp_kses_post($construct_options['email']); ?></span>
									</li>
									<?php } ?>
									<?php if($construct_options['work']!=''){ ?>
									<li>
										<i class="fa fa-clock-o"></i>
										<?php esc_html_e('working time','construct'); ?>:
										<span><?php echo wp_kses_post($construct_options['work']); ?></span>
									</li>
									<?php } ?>
								</ul>
							</div>	
							<div class="col-md-4">
								<ul class="social-icons">
									 <?php if($construct_options['facebook']!=''){ ?>
									  <li class="facebook"><a  href="<?php echo esc_url($construct_options['facebook']); ?>"><i class="fa fa-facebook"></i></a></li>
									  <?php } ?>
									  <?php if($construct_options['twitter']!=''){ ?>
									  <li class="twitter"><a href="<?php echo esc_url($construct_options['twitter']); ?>"><i class="fa fa-twitter"></i></a></li>
									  <?php } ?>
									 <?php if($construct_options['istagram']!=''){ ?>
										<li class="instagram"><a href="<?php echo esc_url($construct_options['instagram']); ?>"><i class="fa fa-instagram"> </i></a></li>
										<?php } ?>
									  <?php if($construct_options['google']!=''){ ?>
									  <li class="google"><a  href="<?php echo esc_url($construct_options['google']); ?>"><i class="fa fa-google-plus"></i></a></li>
									  <?php } ?>
									  <?php if($construct_options['linkedin']!=''){ ?>
									  <li class="linkedin"><a  href="<?php echo esc_url($construct_options['linkedin']); ?>"><i class="fa fa-linkedin"></i></a></li>
									  <?php } ?>
									  <?php if($construct_options['pinterest']!=''){ ?>
									  <li class="pinterest" ><a href="<?php echo esc_url($construct_options['pinterest']); ?>"><i class="fa fa-pinterest"></i></a></li>
									  <?php } ?>
								</ul>
							</div>	
						</div>
					</div>
				</div>
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						
						<a class="navbar-brand"  href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo('name'); ?>">
							<?php if($construct_options['logo']['url']!=''){ ?>
							<img src="<?php echo esc_attr($construct_options['logo']['url']); ?>" alt="<?php bloginfo('name'); ?>">
							  <?php }else{ ?>
								<?php bloginfo('name'); ?>
							  <?php } ?>
						</a>


					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<?php if($construct_options['search']==true){ ?>
						<ul class="nav navbar-nav navbar-right">
							<li class="search drop"><a href="#" class="open-search"><i class="fa fa-search"></i></a>
								<form method="get" class="form-search" action="<?php echo esc_url( home_url() ); ?>" >
									<input type="search" placeholder="Search:" name="s"/>
									<button type="submit">
										<i class="fa fa-search"></i>
									</button>
								</form>
							</li>
						</ul>
						<?php } ?>
						<?php
						$defaults1= array(
								'theme_location'  => 'primary',
								'menu'            => '',
								'container'       => '',
								'container_class' => '',
								'container_id'    => '',
								'menu_class'      => 'nav navbar-nav navbar-right',
								'menu_id'         => '',
								'echo'            => true,
								 'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
								 'walker'            => new wp_bootstrap_navwalker(),
								'before'          => '',
								'after'           => '',
								'link_before'     => '',
								'link_after'      => '',
								'items_wrap'      => '<ul data-breakpoint="800" id="%1$s" class="%2$s">%3$s</ul>',
								'depth'           => 0,
							);
							if ( has_nav_menu( 'primary' ) ) {
								wp_nav_menu( $defaults1 );
							}
						?>
						
					</div><!-- /.navbar-collapse -->
				</div><!-- /.container-fluid -->
			</nav>
		</header>
		<!-- End Header -->