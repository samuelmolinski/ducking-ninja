<?php
/**
 * @package WordPress
 * @subpackage Aquilo Theme
 */ 

if ( ! function_exists( 'mb2_comment' ) ) {
function mb2_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'aquilo' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'aquilo' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
		break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>" class="comment-container">			
            <div class="comment-avatar">            
				<?php
					$avatar_size = 68;
					if ( '0' != $comment->comment_parent )
						$avatar_size = 39;
					echo get_avatar( $comment, $avatar_size );						
				?>				
			</div>
			<?php if ( $comment->comment_approved == '0' ) : ?>
				<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'aquilo' ); ?></em>
				<br />
			<?php endif; ?>
                
            <div class="comment-content">				
                <div class="comment-info">
                <?php // translators: 1: comment author, 2: date and time 
					printf( '%1$s %2$s',
					sprintf( '<span class="comment-info-author">%s</span>', get_comment_author_link() ),
					sprintf( '<span class="comment-info-date">%3$s</span>', esc_url( get_comment_link( $comment->comment_ID ) ), get_comment_time( 'c' ),
					// translators: 1: date, 2: time 
					sprintf( /*__( '%1$s at %2$s', 'aquilo' ),*/ get_comment_date()/*, get_comment_time()*/)));
				?>
                </div>
                <?php comment_text(); ?>
            </div>
			<div class="comment-reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'aquilo' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                <?php edit_comment_link( __( 'Edit', 'aquilo' ), '<span class="edit-link">', '</span>' ); ?>
			</div>
            <div class="clear"></div>
		</div>
	<?php
	break;
	endswitch;
}
}