<?php
/**
 * @package WordPress
 * @subpackage Aquilo Theme
 *
 */
?>
<div id="comments">
<?php
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!'); 
	if (post_password_required()){ ?>
	<p class="nocomments">
		<?php _e('This post is password protected. Enter the password to view comments.','aquilo'); ?>
    </p><!-- end .nocomments -->
<?php
	return;
}



if (have_comments()){ ?>
	<h4 class="title1">
		<?php printf( _n( 'One comment', '%1$s comments', get_comments_number(), 'aquilo' ), number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' ); ?>
	</h4><!-- end .title1 -->
		
<?php 
if (get_comment_pages_count() > 1 && get_option('page_comments')) { ?>
	<nav id="comment-nav-above">
		<?php paginate_comments_links(); ?>
	</nav><!-- end #comment-nav-above -->
<?php 
} 
?>

<ol class="commentlist">
	<?php wp_list_comments(array( 'callback' => 'mb2_comment')); ?>
</ol><!-- end .commentlist -->

<?php 
if (get_comment_pages_count() > 1 && get_option('page_comments')){ ?>
	<nav id="comment-nav-below">
		<?php paginate_comments_links(); ?>
	</nav><!-- end #comment-nav-below -->
<?php 
} 




}
elseif (! comments_open() && ! is_page() && post_type_supports( get_post_type(),'comments')){
?>
	<p class="nocomments">
		<?php _e( 'Comments are closed.', 'aquilo' ); ?>
    </p><!-- end .nocomments -->
<?php 
} 
?>	

<?php 
if (comments_open()){
$commenter = wp_get_current_commenter();
	
$comment_form = array(
        'title_reply'=>'<h4 class="title1">'.__('Leave a Reply', 'aquilo').'</h4>',
		'label_submit' => __('Send Comment', 'aquilo'),
		'id_submit' => 'comment-form-button',
        'comment_notes_after' => '',
		'comment_notes_before' => '',
        'comment_field' => '<p class="form-message"><label for="commentform-comment">' . __('Message:', 'aquilo').'</label><textarea name="comment" id="commentform-comment" cols="30" rows="10" tabindex="4"></textarea></p>',
		'fields' => apply_filters( 'comment_form_default_fields', array(
			'author' => '<p class="form-name"><label for="commentform-name">' . __('Name:', 'aquilo').'</label><input id="commentform-name" name="author" type="text" value="'.esc_attr($commenter['comment_author']).'" size="30" /></p>',
			'email' => '<p class="form-email"><label for="commentform-email">' . __('Email:', 'aquilo') . '</label><input id="commentform-email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" /></p>',
			'url' => '<p class="form-url"><label for="commentform-url">' . __( 'Website:', 'aquilo' ) . '</label><input id="commentform-url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>'
			)
		)		
	);
	
	comment_form($comment_form);  
   } 
?>
</div><!-- end #comments -->