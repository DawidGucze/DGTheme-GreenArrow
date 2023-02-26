<?php if ( post_password_required() ) return; ?>
 
<div id="dgt_comments">
<?php

$required_text = '';
$aria_req = '';

$comment_args = array(
    'id_form'               =>  'commentform',
    'class_form'            =>  'comment-form',
    'id_submit'             =>  'submit',
    'class_submit'          =>  'submit',
    'name_submit'           =>  'submit',
    'title_reply'           =>  esc_html__( 'Leave a Reply', 'dgtheme-greenarrow' ),
    'title_reply_to'        =>  esc_html__( 'Leave a Reply to %s', 'dgtheme-greenarrow' ),
    'cancel_reply_link'     =>  esc_html__( 'Cancel Reply', 'dgtheme-greenarrow' ),
    'label_submit'          =>  esc_html__( 'Post Comment', 'dgtheme-greenarrow' ),
    'format'                =>  'xhtml',
    'comment_field'         =>   '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8" placeholder="' . esc_html__( 'Write a comment', 'dgtheme-greenarrow' ) . ( $req ? ' *' : '' ) . '" aria-required="true"></textarea></p>',
    'must_log_in'           =>  '<p class="must-log-in">' .  sprintf( wp_kses( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'dgtheme-greenarrow' ), array( 'a' => array( 'href' => array(), 'title' => array() )) ), wp_login_url( apply_filters( 'the_permalink', get_permalink() ) ) ) . '</p>',
    'logged_in_as'          =>  '<p class="logged-in-as">' . sprintf( wp_kses( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'dgtheme-greenarrow' ), array( 'a' => array( 'href' => array(), 'title' => array() )) ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
    'comment_notes_before'  =>  '<p class="comment-notes">' . esc_html__( 'Your email address will not be published.', 'dgtheme-greenarrow' ) . ( $req ? $required_text : '' ) . '</p>',
    'comment_notes_after'   =>  '',
    'fields'                =>  apply_filters( 'comment_form_default_fields', array(
        'author'            =>  '<p class="comment-form-author"><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" placeholder="' . esc_html__( 'Your name', 'dgtheme-greenarrow' ) . ( $req ? ' *' : '' ) . '" ' . $aria_req . ' /></p>',   
        'email'             =>  '<p class="comment-form-email"><input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" placeholder="' . esc_html__( 'Your email', 'dgtheme-greenarrow' ) . ( $req ? ' *' : '' ) . '" ' . $aria_req . ' />'.'</p>',
        'url'               =>  '' )
    )
);

comment_form($comment_args); 

if ( have_comments() ) : 

?>
    <div class="comments-title">
        <?php
            printf( _nx( 'One thought on "%2$s"', '%1$s thoughts on "%2$s"', get_comments_number(), 'comments title', 'dgtheme-greenarrow' ), number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
        ?>
    </div>


 
    <ol class="comment-list">
        <?php
            wp_list_comments( array(
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => 35,
            ) );
        ?>
    </ol><!-- .comment-list -->

    <?php
        // Are there comments to navigate through?
        if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
    ?>
    <nav class="navigation comment-navigation" role="navigation">
        <div class="screen-reader-text section-heading"><?php esc_html_e( 'Comment navigation', 'dgtheme-greenarrow' ); ?></div>
        <div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'dgtheme-greenarrow' ) ); ?></div>
        <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'dgtheme-greenarrow' ) ); ?></div>
    </nav><!-- .comment-navigation -->
    <?php endif; // Check for comment navigation ?>

    <?php if ( ! comments_open() && get_comments_number() ) : ?>
    <p class="no-comments"><?php esc_html_e( 'Comments are closed.' , 'dgtheme-greenarrow' ); ?></p>
    <?php endif; ?>

<?php endif; // have_comments() ?>
 

 
</div><!-- #comments -->