
<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
    return;
?>




<div class="comment-section">
	<h2><?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?></h2>
	<ul class="comment-tree">
		<?php 
			$args = array(
				'walker'            => null,
				'max_depth'         => '',
				'style'             => 'ul',
				'callback'          => 'construct_theme_comment',
				'end-callback'      => null,
				'type'              => 'all',
				'reply_text'        => 'Reply',
				'page'              => '',
				'per_page'          => '',
				'avatar_size'       => 80,
				'reverse_top_level' => null,
				'reverse_children'  => '',
				'format'            => 'html5', // or 'xhtml' if no 'HTML5' theme support
				'short_ping'        => false,   // @since 3.6
				'echo'              => true     // boolean, default is true
			); 
		?>
		<?php wp_list_comments($args); ?>
	</ul>
	 <?php
		// Are there comments to navigate through?
		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
		?>
		<footer class="navigation comment-navigation" role="navigation">
		  <!--<h1 class="screen-reader-text section-heading"><?php esc_html_e( 'Comment navigation', 'construct' ); ?></h1>-->
		  <div class="previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'construct' ) ); ?></div>
		  <div class="next right"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'construct' ) ); ?></div>
		</footer><!-- .comment-navigation -->
	  <?php endif; // Check for comment navigation ?>
	  
	 
	<?php
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$comment_args = array(
		'title_reply'=> 'Leave a Reply',
		'fields' => apply_filters( 'comment_form_default_fields', array(
			'author' => '
					<div class="row">
					<div class="col-md-6">
					<input type="text" name="author"   placeholder="Name (required)" id="name" value="' . esc_attr( $commenter['comment_author'] ) . '" ' . $aria_req . ' />
					</div>
				
			',
			'email' => '<div class="col-md-6">
				
					<input id="mail" name="email"   placeholder="Email (required)" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" ' . $aria_req . ' /></div>
					</div>
				
			',
			'url' => '
				<input id="website" name="url"  placeholder="Website" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '"  />
			
			'
		)),
		'comment_field' => '<textarea   rows="7" id="comment" placeholder="Your Message (required)"  name="comment"'.$aria_req.'></textarea>',
		'label_submit' => 'Post Comment',
		'comment_notes_after' => '',
	);
	?>
	  
	<?php global $post; ?>
	<?php if('open' == $post->comment_status){ ?>

		<?php comment_form($comment_args); ?>

	<?php } ?>
	
	</div>