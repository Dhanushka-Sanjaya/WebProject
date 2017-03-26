<?php 
// Prevent loading this file directly
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>	
<?php if ( comments_open() || have_comments() ) : ?>
        <div class="post-comments" id="comments">

                <div class="box-title-area">
                        <h4 class="title">
                        <?php comments_number(__('No Comment', 'elletta'), esc_html__('1 Comment', 'elletta' ), '% ' . esc_html__('Comments', 'elletta') ); ?>
                        </h4>
                </div>

                <div class='comments'>		
                <?php wp_list_comments(array(
                        'avatar_size'	=> 50,
                        'max_depth'		=> 5,
                        'style'			=> 'ul',
                        'callback'		=> 'elletta_comments',
                        'type'			=> 'all'
                )); ?>
                </div>

                <div id='comments_pagination'>
                <?php paginate_comments_links(array('prev_text' => '&laquo;', 'next_text' => '&raquo;')); ?>
                </div>

                <div class='commment-form-wrapper' data-required-text='<?php esc_html__('Please fill the required field.', 'elletta'); ?>' data-email-check-text='<?php esc_html__('Please enter a valid email address.', 'elletta'); ?>'>
                <?php 
                $args = array(
                        'fields' => apply_filters(
                                'comment_form_default_fields', array(
                                        'author' =>'<p class="comment-form-author">' .
                                                '<label for="author">' . esc_html__( 'Your Name', 'elletta' ) .
                                                ( $req ? '<span class="required">*</span>' : '' ) . '</label> '  .
                                                '<input id="author" placeholder="' . esc_html__( 'Your Name (No Keywords)', 'elletta' )  . '" name="author" type="text" value="' .
                                                esc_attr( $commenter['comment_author'] ) . '" size="30" />'.                                               
                                                '</p>'
                                                ,
                                        'email'  => '<p class="comment-form-email">' . 
                                                '<label for="email">' . esc_html__( 'Your Email', 'elletta' )  .
                                                ( $req ? '<span class="required">*</span>' : '' ) . '</label> '
                                                 .
                                                '<input id="email" placeholder="your-real-email@example.com" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
                                                '" size="30" />'  .                                               
                                                '</p>',
                                        'url'    => '<p class="comment-form-url">' .
                                                '<label for="url">' . esc_html__( 'Website', 'elletta' ) . '</label>' .
                                                '<input id="url" name="url" placeholder="http://your-site-name.com" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /> ' .
                                        
                                   '</p>'
                                )
                        ),
                        'comment_field' => '<p class="comment-form-comment">' .
                                '<label for="comment">' . esc_html__( 'Let us know what you have to say:', 'elletta' ) . '</label>' .
                                '<textarea id="comment" name="comment" placeholder="' . esc_html__( 'Express your thoughts, idea or write a feedback by clicking here & start an awesome comment', 'elletta' ) . '" cols="45" rows="8" aria-required="true"></textarea>' .
                                '</p>',
                    'comment_notes_after' => '',
                    'title_reply' => '<div class="crunchify-text"> <h5>' . esc_html__( 'Please Post Your Comments & Reviews', 'elletta' ) . '</h5></div>'
                );
                comment_form($args); ?>
                </div>
        </div>
<?php endif; ?>
