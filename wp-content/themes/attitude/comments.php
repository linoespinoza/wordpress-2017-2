<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to attitude_comment() which is
 * located in the content-extensions.php file under the function folder inside library folder.
 *
 * @package Theme Horse
 * @subpackage Attitude
 * @since Attitude 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>

<div id="comments" class="comments-area">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h3 class="comments-title">
			<?php
				if( 1 == get_comments_number() ) {
					printf( __( 'One thought on &ldquo;%2$s&rdquo;', 'attitude' ), number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
				}
				else {
					printf( __( '%1$s thoughts on &ldquo;%2$s&rdquo;', 'attitude' ), number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
				}				
			?>
		</h3>

		<ol class="commentlist">
			<?php wp_list_comments( array( 'callback' => 'attitude_comment', 'style' => 'ol' ) ); ?>
		</ol><!-- .commentlist -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<ul class="default-wp-page clearfix">
			<h1 class="assistive-text section-heading"><?php _e( 'Comment navigation', 'attitude' ); ?></h1>
			<li class="previous"><?php previous_comments_link( __( '&larr; Older Comments', 'attitude' ) ); ?></li>
			<li class="next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'attitude' ) ); ?></li>
		</ul>
		<?php endif; // check for comment navigation ?>

	<?php // If comments are closed and there are comments, let's leave a little note.
		elseif ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="nocomments"><?php _e( 'Comments are closed.', 'attitude' ); ?></p>
	<?php endif; ?>

	<?php comment_form(); ?>

</div><!-- #comments .comments-area -->