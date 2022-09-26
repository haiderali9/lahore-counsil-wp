<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package lowlead
 */

/*
 * Render comment list
 */
function themesflat_comments( $comment, $args, $depth ) {
$GLOBALS['comment'] = $comment; ?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
    <article id="comment-<?php comment_ID(); ?>" class="comment_wrap clearfix">
        <div class="gravatar">
			<?php if ( $args['avatar_size'] != 0 ) {
				echo get_avatar( $comment, 140 );
			} ?>
        </div>
        <div class='comment_content'>
            <div class="comment_meta clearfix">
				<?php printf( '<h4 class="comment_author">%s</h4>', get_comment_author_link() ); ?><?php edit_comment_link( esc_html__( '(Edit)', 'lowlead' ), '  ', '' ) ?>
            </div>
            <div class='comment_text'>
				<?php comment_text() ?>
				<?php if ( $comment->comment_approved == '0' ) : ?>
                    <span class="unapproved"><?php esc_html_e( 'Your comment is awaiting moderation.', 'lowlead' ) ?></span>
				<?php endif; ?>
            </div>
			<?php if ( get_comment_reply_link( array_merge( $args, array(
				'depth'     => $depth,
				'max_depth' => $args['max_depth']
			) ) ) ): ?>
                <div class="themesflat-comment-footer d-flex align-items-center">
                    <div class="comement_reply">
                        <span class="themesflate-reply-icon"><i class="far fa-reply-all"></i></span>
						<?php comment_reply_link( array_merge( $args, array(
							'depth'     => $depth,
							'max_depth' => $args['max_depth']
						) ) ) ?>
                    </div>
                </div>
			<?php endif; ?>
        </div>
    </article>
	<?php
	}

	/*
	 * If the current post is protected by a password and
	 * the visitor has not yet entered the password we will
	 * return early without loading the comments.
	 */
	if ( post_password_required() ) {
		return;
	}
	?>

    <div id="comments" class="comments-area">
		<?php if ( have_comments() ) : ?>
        <div class="comment-list-wrap">
            <h3 class="comment-title">
				<?php comments_number( esc_html__( '0 Comments', 'lowlead' ), esc_html__( '01 Comment', 'lowlead' ), esc_html__( '% Comments', 'lowlead' ) ); ?>
            </h3>
            <ol class="comment-list">
				<?php wp_list_comments( array( 'callback' => 'themesflat_comments' ) ); ?>
            </ol>
			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
                <nav class="navigation comment-navigation" role="navigation">
                    <h5 class="screen-reader-text section-heading"><?php esc_html_e( 'Comment navigation', 'lowlead' ); ?></h5>

                    <div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'lowlead' ) ); ?></div>
                    <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'lowlead' ) ); ?></div>
                </nav>
			<?php endif; ?>
			<?php if ( ! comments_open() && get_comments_number() ) : ?>
                <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'lowlead' ); ?></p>
			<?php endif; ?>
        </div><!-- /.comment-list-wrap -->

		<?php endif; ?><!-- have_comments -->

		<?php
		if ( comments_open() ) {
			$commenter    = wp_get_current_commenter();
			$aria_req     = get_option( 'require_name_email' ) ? " aria-required='true'" : '';
			$rating_input = '';
			for ( $i = 5; $i > 0; $i -- ):
				$rating_input .= '<input type="radio" id="star-' . esc_attr( $i ) . '" name="rating" value="' . esc_attr( $i ) . '" ' . checked( $i, 0 ) . '>
                <label for="star-' . esc_attr( $i ) . '" class="mb-0 mr-1 lh-1"><i class="far fa-star"></i></label>';
			endfor;
			$comment_args = array(
				'title_reply'  => esc_html__( 'Leave Comments', 'lowlead' ),
				'id_submit'    => 'comment-reply',
				'label_submit' => esc_html__( 'Post Comment', 'lowlead' ),
				'class_form'   => 'clearfix',

				'fields'        => apply_filters( 'comment_form_default_fields', array(
					'author'  => '<div class="comment_wrap_input">
								<div class="comment-left">
									<fieldset class="name-container">									
										<input type="text" id="author" placeholder="' . esc_attr__( 'Your Full Name', 'lowlead' ) . '" class="tb-my-input" name="author" tabindex="1" value="' . esc_attr( $commenter['comment_author'] ) . '" size="32"' . $aria_req . '>
									</fieldset>',
					'email'   => '<fieldset class="email-container">									
										<input type="text" id="email" placeholder="' . esc_attr__( 'info.lawlead@gmail.com', 'lowlead' ) . '" class="tb-my-input" name="email" tabindex="2" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="32"' . $aria_req . '>
									</fieldset>',
					'phone'   => '<fieldset class="phone-container">									
										<input type="text" id="phone" placeholder="' . esc_attr__( '+55 (121) 234 444', 'lowlead' ) . '" class="tb-my-input" name="phone" tabindex="2" value="" size="32"' . $aria_req . '>
									</fieldset>',
					'address' => '<fieldset class="address-container">									
										<input type="text" id="address" placeholder="' . esc_attr__( 'Enter Your Address', 'lowlead' ) . '" class="tb-my-input" name="address" tabindex="2" value="" size="32"' . $aria_req . '>
									</fieldset>',
					'</div ></div > ',

				) ),
				'comment_field' => '<div class="comment-right" >
									    <fieldset class="message" >
										    <textarea id ="comment-message" placeholder = "' . esc_attr__( 'Write your comment here...', 'lowlead' ) . '" name = "comment" rows = "8" tabindex = "4" ></textarea >
									    </fieldset >
								    </div > ',
				'submit_field'  => '<p class="form-submit themesflat-button-submit" ><span class="wrap-input-submit" >%1$s %2$s </span ></p>',
				'comment_notes_before' => '<p class="tf-comment-note-before">' . esc_html__( 'Nunc velit metus, volutpat elementum euismod eget, cursus nec nunc.', 'lowlead' ) . '</p>',
			);

			comment_form( $comment_args );
		}
		?><!-- comments_open -->
    </div><!-- #comments -->