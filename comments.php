<?php
/**
 * The template for displaying comments
 * The area of the page that contains both current comments
 * and the comment form.
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly!');
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">
	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<aside class="no-comments"><?php _e( '评论已关闭', 'ZTI' ); ?></aside>
	<?php endif; ?>
	<?php comment_form(); ?>
	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				printf( _nx( 'One Comment', '%1$s Comments', get_comments_number(), 'comments title', 'ZTI' ),
					number_format_i18n( get_comments_number() ), get_the_title() );
			?>
		</h2>
		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       => 'ol',
					'short_ping'  => true,
					'type' => 'all',
					'avatar_size' => 56,
				) );
			?>
		</ol><!-- .comment-list -->
		<nav class="comments-nav">
			<?php paginate_comments_links(); ?>
		</nav>
	<?php endif; // have_comments() ?>
</div><!-- .comments-area -->