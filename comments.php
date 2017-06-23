<?php /* O template de comentários! */ ?>
<div id="comments" class="col-lg-12">
    
    <?php
        $req = get_option('require_name_email'); // Verifica se os campos são obrigatórios.
    if ( 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']) )
    die ( 'Please do not load this page directly. Thanks!' );
    if ( ! empty($post->post_password) ) :
    if ( $_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password ) :
    
    ?>
        
    <div class="nopassword"><?php _e('This post is password protected. Enter the password to view any comments.', 'seu-template') ?></div>

</div>

    <?php
        return;
        endif;
        endif;
    ?>
 
    <?php 

        if ( have_comments() ) : 

    ?>
 
    <?php 

        $ping_count = $comment_count = 0;
        foreach ( $comments as $comment )
        get_comment_type() == "comment" ? ++$comment_count : ++$ping_count;

    ?>

    <?php if ( ! empty($comments_by_type['comment']) ) : ?>
 
<div id="comments-list" class="comments">
    
    <h3>
        <?php printf($comment_count > 1 ? __('<span>%d</span> Comentários', 'seu-template') : __('<span>1</span> Comentário', 'seu-template'), $comment_count) ?>
    </h3>
 
    <?php $total_pages = get_comment_pages_count(); if ( $total_pages > 1 ) : ?>
     
    <div id="comments-nav-above" class="comments-navigation">
        <div class="paginated-comments-links">
            <?php paginate_comments_links(); ?>
        </div>
    </div>

    <?php endif; ?>    
 
     <ol>
        <?php wp_list_comments('type=comment&callback=custom_comments'); ?>
     </ol>
 
    <?php $total_pages = get_comment_pages_count(); if ( $total_pages > 1 ) : ?>

    <div id="comments-nav-below" class="comments-navigation">
        <div class="paginated-comments-links"><?php paginate_comments_links(); ?></div>
    </div>

    <?php endif; ?>    
 
</div>
 
<?php endif; /* if ( $comment_count ) */ ?>
 
<?php /* Se existirem trackbacks(pings), mostrar os trackbacks  */ ?>
<?php if ( ! empty($comments_by_type['pings']) ) : ?>
 
    <div id="trackbacks-list" class="comments">
     <h3><?php printf($ping_count > 1 ? __('<span>%d</span> Trackbacks', 'seu-template') : __('<span>Um</span> Trackback', 'seu-template'), $ping_count) ?></h3>
 
<?php /* Uma lista ordenada de trackbacks, custom_pings(), in functions.php   */ ?>
     <ol>
        <?php wp_list_comments('type=pings&callback=custom_pings'); ?>
     </ol>    
 
    </div>
 
<?php endif /* if ( $ping_count ) */ ?>
<?php endif /* if ( $comments ) */ ?>
 
<?php /* Se os comentários estiverem ligados, criar o formulário de resposta */ ?>
<?php if ( 'open' == $post->comment_status ) : ?>
    
    <div id="respond">
        <div id="cancel-comment-reply">
            <?php cancel_comment_reply_link() ?>
        </div>
 
<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
     <p id="login-req"><?php printf(__('You must be <a href="%s" title="Log in">logged in</a> to post a comment.', 'seu-template'),
     get_option('siteurl') . '/wp-login.php?redirect_to=' . get_permalink() ) ?></p>
 
<?php else : ?>
     <div class="formcontainer">
 
      <form id="commentform" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">
 
<?php if ( $user_ID ) : ?>
       <p id="login"><?php printf(__('<span class="loggedin">Você está logado como: <a href="%1$s" title="Logado como: %2$s">%2$s</a>.</span> <span class="logout"><a href="%3$s" title="Encerrar Sessão">Sair?</a></span>', 'seu-template'),
        get_option('siteurl') . '/wp-admin/profile.php',
        wp_specialchars($user_identity, true),
        wp_logout_url(get_permalink()) ) ?></p>
 
<?php else : ?>
 
<div class="clear"></div>
<div class="accordion">
    <div class="accordion-group">
       
        <div class="accordion-heading area">
            <a class="accordion-toggle" data-toggle="collapse" href=
            "#area1">Deixe seu comentário<i class="glyphicon glyphicon-chevron-down"></i></a>
        </div>

        <div class="accordion-body collapse" id="area1">
            <div class="accordion-inner">
                <div class="accordion" id="equipamento1">

                    <div class="accordion-group">
                        <div class="accordion-heading equipamento">
                            
                            <div id="form-section-author" class="form-section form-group">
                                <div class="form-label">
                                    <label for="author" class="col-md-3 control-label">
                                        <?php _e('Nome*', 'seu-template') ?>
                                    </label>
                                </div>
                                <div class="col-md-9 form-input">
                                    <input id="author" name="author" type="text" value="<?php echo $comment_author ?>" size="30" maxlength="20" tabindex="3" class="form-control" />
                                </div>
                            </div>

                            <div id="form-section-email" class="form-section form-group">
                                <div class="form-label">
                                    <label for="email" class="col-md-3 control-label">
                                        <?php _e('Email*', 'seu-template') ?>
                                    </label>
                                </div>
                                <div class="col-md-9 form-input">
                                    <input id="email" name="email" type="text" value="<?php echo $comment_author_email ?>" size="30" maxlength="50" tabindex="4" class="form-control" />
                                </div>
                            </div>

                            <div id="form-section-assunto" class="form-section form-group">
                                <div class="form-label">
                                    <label for="assunto" class="col-md-3 control-label">
                                        <?php _e('Assunto*', 'seu-template') ?>
                                    </label>
                                </div>
                                <div class="col-md-9 form-input">
                                    <input id="assunto" name="assunto" type="text" value="<?php echo $comment_author_assunto ?>" size="30" maxlength="50" tabindex="5" class="form-control" />
                                </div>
                            </div>

                            <?php endif /* if ( $user_ID ) */ ?>

                            <div id="form-section-comment" class="form-section form-group">
                                <div class="form-label">
                                    <label for="comment" class="col-md-3 control-label">
                                        <?php _e('Comentário*', 'seu-template') ?>
                                    </label>
                                </div>
                                <div class="clear"></div>
                                <div class="form-textarea col-md-12">
                                    <textarea id="comment" name="comment" cols="45" rows="8" tabindex="6" class="form-control"></textarea>
                                </div>
                            </div>

                            <?php do_action('comment_form', $post->ID); ?>

                            <div class="form-submit form-group">
                                <input id="submit" name="submit" type="submit" value="<?php _e('Enviar Comentário', 'seu-template') ?>" tabindex="7" class="btn btn-outlined btn-danger"/>
                                <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
                            </div>

                            <p id="comment-notes">
                                <?php _e('Seu email nunca será publicado ou distribuído. Os campos com (*) são obrigatórios.', 'your-theme') ?>
                            </p>

                            <?php comment_id_fields(); ?> 
                            
                        
                    </div>

                </div>
            </div>
        </div>
        </div>
    </div>
</div><!-- /accordion -->
 
<?php /* O código termina aqui. Está feito. Vamos encerrá-lo. */ ?>  
 
      </form>
     </div>
<?php endif /* if ( get_option('comment_registration') && !$user_ID ) */ ?>
    </div>
<?php endif /* if ( 'open' == $post->comment_status ) */ ?>
   </div>