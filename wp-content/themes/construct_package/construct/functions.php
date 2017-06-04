<?php

require_once get_template_directory() . '/framework/theme-configs.php';
require_once get_template_directory() . '/framework/import.php';
require_once get_template_directory() . '/framework/widget/popular.php';
require_once get_template_directory() . '/framework/widget/recent.php';
require_once get_template_directory() . '/framework/wp_bootstrap_navwalker.php';
if(function_exists('vc_add_param')){
require_once get_template_directory() . '/vc_functions.php';
}

if ( ! isset( $content_width ) )
	$content_width = 604;

function construct_setup() {
	/*
	 * Makes construct available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on construct, use a find and
	 * replace to change 'construct' to the name of your theme in all
	 * template files.
	 */
	load_theme_textdomain( 'construct', get_template_directory() . '/languages' );

	
	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	 add_theme_support( 'custom-header');
	 add_theme_support( 'custom-background');
	/*
	 * Switches default core markup for search form, comment form,
	 * and comments to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * This theme supports all available post formats by default.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	 add_theme_support( 'post-formats', array(
		 'video','gallery','audio','quote'
	) );
	 
	add_theme_support( 'woocommerce' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', esc_html__( 'Navigation Menu', 'construct' ) );

	/*
	 * This theme uses a custom image size for featured images, displayed on
	 * "standard" posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );
	
	
}
add_action( 'after_setup_theme', 'construct_setup' );

function construct_scripts_styles() {
	global $construct_options;
	/*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	
	// Loads JavaScript file with functionality specific to construct.
	wp_enqueue_script("construct-bootstrap", get_template_directory_uri()."/js/bootstrap.min.js",array(),false,true);
	
	wp_enqueue_script("construct-imagesloaded", get_template_directory_uri()."/js/jquery.imagesloaded.min.js",array(),false,true);
	wp_enqueue_script("construct-isotope", get_template_directory_uri()."/js/jquery.isotope.min.js",array(),false,true);
	wp_enqueue_script("construct-retina", get_template_directory_uri()."/js/retina-1.1.0.min.js",array(),false,true);
	wp_enqueue_script("construct-carousel", get_template_directory_uri()."/js/owl.carousel.min.js",array(),false,true);

	
	wp_enqueue_script("construct-script", get_template_directory_uri()."/js/script.js",array(),false,true);

	// Add Source Sans Pro and Bitter fonts, used in the main stylesheet.
	wp_enqueue_style( 'construct-font-awesome', get_template_directory_uri().'/css/font-awesome.css');
	wp_enqueue_style( 'construct-bootstrap', get_template_directory_uri().'/css/bootstrap.min.css');
	wp_enqueue_style( 'construct-carousel', get_template_directory_uri().'/css/owl.carousel.css');
	wp_enqueue_style( 'construct-carousel.theme', get_template_directory_uri().'/css/owl.theme.css');
	
	wp_enqueue_style( 'construct-construct', get_template_directory_uri().'/css/construct_style.css');
	// Loads our main stylesheet.
	wp_enqueue_style( 'construct-style', get_stylesheet_uri(), array(), '2015-11-09' );
	
	

}
add_action( 'wp_enqueue_scripts', 'construct_scripts_styles' );

/*
Register Fonts
*/
function construct_fonts_url() {
	global $construct_options;
    $font_url = '';
    
    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'construct' ) ) {
        $font_url = add_query_arg( 'family', urlencode( $construct_options['body-font2']['font-family'].':400,700,300&subset=latin,latin-ext' ), "//fonts.googleapis.com/css" );
    }
    return $font_url;
}
/*
Enqueue scripts and styles.
*/
function construct_scripts() {
	global $construct_options;
	if($construct_options!=null && $construct_options['body-font2']['font-family'] != ''){
		wp_enqueue_style( 'construct-fonts', construct_fonts_url(), array(), '1.0.0' );
	}
}
add_action( 'wp_enqueue_scripts', 'construct_scripts' );


//Colors

add_action('wp_head','construct_color');

function construct_color() {
	global $construct_options;
	$main_color = $construct_options['main-color']; ?>

	<style> 
		.page-banner-section ul.page-depth li a:hover{ color: <?php echo esc_attr($main_color); ?>; }
		.services-tabs .widget_nav_menu ul li a:hover, .services-tabs .widget_nav_menu ul li.current_page_item a, footer h2:after, .footer-widgets .tagcloud a:hover, input[type="submit"],.testimonial-section .testimonial-box span:after,.quote-section .quote-box h1:after,.banner-section, .portfolio-section .project-post .project-gallery .hover-box .inner-hover h2:after, .tabs-section .about-us-box h1:after, .tabs-section .about-us-box .about-us-post a:hover, .news-section .news-post .news-gallery .date-post,.owl-theme .owl-controls .owl-buttons div:hover,#contact-form input[type="submit"], .comment-form input[type="submit"]{
		  background: <?php echo esc_attr($main_color); ?>;
		 }
		 .navbar-nav > li > a:hover , ul.drop-down a:hover,
		  .navbar-nav > li > a:hover {
		    color: <?php echo esc_attr($main_color); ?> !important;
		  }
		  .wpcf7-textarea:focus, .wpcf7-text:focus{
		  	border-color: <?php echo esc_attr($main_color); ?>;
		  }
		 ul.drop-down{
			border-top-color: <?php echo esc_attr($main_color); ?>;
		 }
		 .pagination-list li .current,footer .footer-widgets .widgets span, .form-search button i, .portfolio-section ul.filter li a:hover, .portfolio-section ul.filter li a.active, .project-tags ul li i, .top-line ul.social-icons li a:hover,.testimonial-section .testimonial-box h2,.top-line ul.info-list li i, .banner-section a:hover, a:hover, .portfolio-section .project-post .project-gallery .hover-box .inner-hover h2 a:hover, .news-section .news-post .news-content h2 a:hover, .news-section .news-post .news-content > a:hover {
		  color: <?php echo esc_attr($main_color); ?>;
		}
		<?php echo esc_attr($construct_options['custom-css']); ?>
		<?php if($construct_options['body_style']=='boxed'){ ?>
			body{
				background-color: #f3f3f3;
			}
			#container {
			  background: #fff;
			  max-width: 1200px;
			  margin: 0 auto;
			  position: relative;
			  z-index: 2;
			  overflow: hidden;
			  box-shadow: 0 0 12px #aaa;
			  -webkit-box-shadow: 0 0 12px #aaa;
			  -moz-box-shadow: 0 0 12px #aaa;
			  -o-box-shadow: 0 0 12px #aaa;
			  -ms-box-shadow: 0 0 12px #aaa;
			  transition: all 0.2s ease-in-out;
			  -moz-transition: all 0.2s ease-in-out;
			  -webkit-transition: all 0.2s ease-in-out;
			  -o-transition: all 0.2s ease-in-out;
			  padding-top: 0px;
			}
			.owl-theme .owl-controls .owl-buttons div{
				display: none;
			}
		<?php } ?>
		@media (max-width: 767px) {
			
		}
		.services-content > a{ display: block; }
	</style>

<?php 

}

function construct_thumbnail_url($size){
    global $post;
   
    if($size==''){
        $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
         return $url;
    }else{
        $url = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), $size);
         return $url[0];
    }
   
}

function construct_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Main Widget Area', 'construct' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Appears in main sidebar of the site.', 'construct' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Services Widget Area', 'construct' ),
		'id'            => 'sidebar-service',
		'description'   => esc_html__( 'Appears in main sidebar of Page Services Template.', 'construct' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    

	register_sidebar( array(
		'name'          => esc_html__( 'Footer1 Widget Area', 'construct' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Appears in the footer section 1 of the site.', 'construct' ),
		'before_widget' => '<aside id="%1$s" class="widgets %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer2 Widget Area', 'construct' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Appears in the footer section 2 of the site.', 'construct' ),
		'before_widget' => '<aside id="%1$s" class="widgets %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer3 Widget Area', 'construct' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Appears in the footer section 3 of the site.', 'construct' ),
		'before_widget' => '<aside id="%1$s" class="widgets %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer4 Widget Area', 'construct' ),
		'id'            => 'footer-4',
		'description'   => esc_html__( 'Appears in the footer section 3 of the site.', 'construct' ),
		'before_widget' => '<aside id="%1$s" class="widgets %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    
}
add_action( 'widgets_init', 'construct_widgets_init' );

function construct_excerpt($limit = 30) {
 
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}

//pagination
function construct_pagination($prev = 'Prev', $next = 'Next', $pages='') {
    global $wp_query, $wp_rewrite;
    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
    if($pages==''){
        global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
    }if(is_front_page() and !is_home()) {
		$curent = (get_query_var('page')) ? get_query_var('page') : 1;
	} else {
		$curent = (get_query_var('paged')) ? get_query_var('paged') : 1;
	}
    $pagination = array(
			'base' 			=> str_replace( 999999999, '%#%', get_pagenum_link( 999999999 ) ),
			'format' 		=> '',
			'current' 		=> max( 1, $curent),
			'total' 		=> $pages,
			'prev_text' => $prev,
			'next_text' => $next,
			'type'			=> 'list',
			'end_size'		=> 3,
			'mid_size'		=> 3
	);
    $return =  paginate_links( $pagination );
	echo str_replace( "<ul class='page-numbers'>", '<ul class="pagination-list">', $return );
}

//Custom comment List:
function construct_theme_comment($comment, $args, $depth) {
	
     $GLOBALS['comment'] = $comment; ?>
     <!--=======  COMMENTS =========-->
	 <li <?php comment_class(''); ?> id="comment-<?php comment_ID() ?>" >
		<div class="comment-box">
			<?php if($comment->user_id!='0' and get_user_meta($comment->user_id, 'avatar' ,true)!=''){ ?>
				<?php $image = wp_get_attachment_image_src(get_user_meta($comment->user_id, 'avatar' ,true), 'full'); ?>
				<img src="<?php echo esc_attr($image[0]); ?>" />
			<?php }else{ ?>
				<?php echo get_avatar($comment); ?>
			<?php } ?>
			<div class="comment-content">
				<h4><?php printf(esc_html__('%s','construct'), get_comment_author_link()) ?> <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></h4>
				<span><?php printf(esc_html__('%1$s at %2$s','construct'), get_comment_date(), get_comment_time()) ?></span>
				 <?php comment_text() ?>
				 <?php if ($comment->comment_approved == '0') : ?>
				 <em><?php esc_html_e('Your comment is awaiting moderation.','construct') ?></em>
				 <br />
			 <?php endif; ?>
			</div>
		</div>
	 
<?php

}

function construct_breadcrumb() {
       /* === OPTIONS === */
    $text['home']     = 'Home'; // text for the 'Home' link
    $text['category'] = 'Archive by Category "%s"'; // text for a category page
    $text['tax']       = 'Archive for "%s"'; // text for a taxonomy page
    $text['search']   = 'Search Results for "%s" Query'; // text for a search results page
    $text['tag']      = 'Posts Tagged "%s"'; // text for a tag page
    $text['author']   = 'Articles Posted by %s'; // text for an author page
    $text['404']      = 'Error 404'; // text for the 404 page
    $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
    $showOnHome  = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
    $delimiter   = ''; // delimiter between crumbs
    $before      = '<li class="active">'; // tag before the current crumb
    $after       = '</li>'; // tag after the current crumb

    /* === END OF OPTIONS === */

    global $post;
    $homeLink = home_url('/') . '/';
    $linkBefore = '<li>';
    $linkAfter = '</li>';
    $linkAttr = ' rel="v:url" property="v:title"';
    $link = $linkBefore . '<a' . $linkAttr . ' href="%1$s">%2$s</a>' . $linkAfter;
    if (is_home() || is_front_page()) {
        if ($showOnHome == 1) echo '<div id="crumbs"><a href="' . $homeLink . '">' . $text['home'] . '</a></div>';
    } else {
        echo '<ul id="breadcrumbs" class="page-depth">' . sprintf($link, $homeLink, $text['home']) . $delimiter;
        if ( is_category() ) {
            $thisCat = get_category(get_query_var('cat'), false);
            if ($thisCat->parent != 0) {
                $cats = get_category_parents($thisCat->parent, TRUE, $delimiter);
                $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
                $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
                echo $cats;
            }
            echo $before . sprintf($text['category'], single_cat_title('', false)) . $after;
        } elseif( is_tax() ){
            $thisCat = get_category(get_query_var('cat'), false);
            if ($thisCat->parent != 0) {
                $cats = get_category_parents($thisCat->parent, TRUE, $delimiter);
                $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
                $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
                echo $cats;
            }

            echo $before . sprintf($text['tax'], single_cat_title('', false)) . $after;
        }elseif ( is_search() ) {
            echo $before . sprintf($text['search'], get_search_query()) . $after;
        } elseif ( is_day() ) {
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
            echo sprintf($link, get_month_link(get_the_time('Y'),get_the_time('m')), get_the_time('F')) . $delimiter;
            echo $before . get_the_time('d') . $after;
        } elseif ( is_month() ) {
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
            echo $before . get_the_time('F') . $after;
        } elseif ( is_year() ) {
            echo $before . get_the_time('Y') . $after;
        } elseif ( is_single() && !is_attachment() ) {
            if ( get_post_type() != 'post' ) {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                printf($link, $homeLink . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
                if ($showCurrent == 1) echo $delimiter . $before . get_the_title() . $after;
            } else {
                $cat = get_the_category(); $cat = $cat[0];
                $cats = get_category_parents($cat, TRUE, $delimiter);
                if ($showCurrent == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
                $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
                $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
                echo $cats;
                if ($showCurrent == 1) echo $before . get_the_title() . $after;
            }
        } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
            $post_type = get_post_type_object(get_post_type());
            echo $before . $post_type->labels->singular_name . $after;
        } elseif ( is_attachment() ) {
            $parent = get_post($post->post_parent);
            $cat = get_the_category($parent->ID); $cat = $cat[0];
            $cats = get_category_parents($cat, TRUE, $delimiter);
            $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
            $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
            echo $cats;
            printf($link, get_permalink($parent), $parent->post_title);
            if ($showCurrent == 1) echo $delimiter . $before . get_the_title() . $after;
        } elseif ( is_page() && !$post->post_parent ) {
            if ($showCurrent == 1) echo $before . get_the_title() . $after;
        } elseif ( is_page() && $post->post_parent ) {
            $parent_id  = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
                $parent_id  = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            for ($i = 0; $i < count($breadcrumbs); $i++) {
                echo $breadcrumbs[$i];
                if ($i != count($breadcrumbs)-1) echo $delimiter;
            }
            if ($showCurrent == 1) echo $delimiter . $before . get_the_title() . $after;
        } elseif ( is_tag() ) {
            echo $before . sprintf($text['tag'], single_tag_title('', false)) . $after;
        } elseif ( is_author() ) {
             global $author;
            $userdata = get_userdata($author);
            echo $before . sprintf($text['author'], $userdata->display_name) . $after;
        } elseif ( is_404() ) {
            echo $before . $text['404'] . $after;
        }
        if ( get_query_var('paged') ) {
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
            echo esc_html__('Page','construct') . ' ' . get_query_var('paged');
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
        }
        echo '</ul>';
    }
}

// Remove Redux Ads
function construct_admin_styles() {
?>
<style type="text/css">
.rAds, .rAds span, .rAds div, .redux-notice {
display: none !important;
}
</style>
<?php
}
add_action('admin_head', 'construct_admin_styles');



/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.5.2
 * @author     Thomas Griffin <thomasgriffinmedia.com>
 * @author     Gary Jones <gamajo.com>
 * @copyright  Copyright (c) 2014, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/thomasgriffin/TGM-Plugin-Activation
 */
/**
 * Include the TGM_Plugin_Activation class.
 */
require_once get_template_directory() . '/framework/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'construct_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function construct_register_required_plugins() {
    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
             // This is an example of how to include a plugin from a private repo in your theme.

		array(            
            'name'               => 'WPBakery Visual Composer', // The plugin name.
            'slug'               => 'js_composer', // The plugin slug (typically the folder name).
            'source'             => 'http://qkthemes.net/plugins/js_composer.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
        ),
		array(            
            'name'               => 'Revolution Slider', // The plugin name.
            'slug'               => 'revslider', // The plugin slug (typically the folder name).
            'source'             => 'http://qkthemes.net/plugins/revslider.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
        ),
		array(            
            'name'               => 'QK Register Post Type', // The plugin name.
            'slug'               => 'qk-post_type', // The plugin slug (typically the folder name).
            'source'             => get_stylesheet_directory_uri() . '/framework/plugins/qk-post_type.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
        ),

        // This is an example of how to include a plugin from the WordPress Plugin Repository.
		array(
            'name'      => 'Contact Form 7',
            'slug'      => 'contact-form-7',
            'required'  => true,
        ),
        array(
            'name'      => 'Redux Framework',
            'slug'      => 'redux-framework',
            'required'  => true,
        ),array(
            'name'      => 'Advanced Custom Fields',
            'slug'      => 'advanced-custom-fields',
            'required'  => true,
        ),array(
            'name'      => esc_html__( 'Redux Developer Mode Disabler', 'construct' ),
            'slug'      => 'redux-developer-mode-disabler',
            'required'  => false,
        ),array(
            'name'      => esc_html__( 'One Click Demo Import', 'construct' ),
            'slug'      => 'one-click-demo-import',
            'required'  => false,
        ),
		
    );

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => esc_html__( 'Install Required Plugins', 'construct' ),
            'menu_title'                      => esc_html__( 'Install Plugins', 'construct' ),
            'installing'                      => esc_html__( 'Installing Plugin: %s', 'construct' ), // %s = plugin name.
            'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'construct' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'construct' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'construct' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'construct' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'construct' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'construct' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'construct' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'construct' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'construct' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'construct' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'construct' ),
            'return'                          => esc_html__( 'Return to Required Plugins Installer', 'construct' ),
            'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'construct' ),
            'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'construct' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );
    tgmpa( $plugins, $config );
}
?>