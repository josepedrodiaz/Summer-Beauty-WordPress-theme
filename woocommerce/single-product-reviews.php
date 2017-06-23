<?php
/**
 * Display single product reviews (comments)
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */
global $woocommerce, $product;

if ( ! defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly

if ( ! comments_open() )
	return;
?>
<div id="reviews">
	<div id="comments">
		<?php if ( have_comments() ) : ?>

			<ol class="commentlist">
				<?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments' ) ) ); ?>
			</ol>

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
				echo '<nav class="woocommerce-pagination">';
				paginate_comments_links( apply_filters( 'woocommerce_comment_pagination_args', array(
					'prev_text' => '&larr;',
					'next_text' => '&rarr;',
					'type'      => 'list',
				) ) );
				echo '</nav>';
			endif; ?>

		<?php else : ?>

			<p class="woocommerce-noreviews"><?php _e( 'There are no reviews yet.', 'woocommerce' ); ?></p>

		<?php endif; ?>
	</div>

	<?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->id ) ) : ?>



<a href="#" class="btn btn-default btn-default2" data-toggle="modal" data-target="#basicModal">Deixe sua avaliação<i class="glyphicon glyphicon-plus" style="padding: 0 0 0 10px;"></i></a>


<div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="background: #c3c3c3 !important;">

      <div class="modal-header">
        <a type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</a>
        <h4 class="modal-title" id="myModalLabel">Deixe Seu Comentário</h4>
      </div>

      <div class="modal-body">
        <div id="review_form_wrapper">
			<div id="review_form">
			<?php
			/*
				$commenter = wp_get_current_commenter();

				$comment_form = array(
					'title_reply'          => have_comments() ? __( 'Add a review', 'woocommerce' ) : __( 'Be the first to review', 'woocommerce' ) . ' &ldquo;' . get_the_title() . '&rdquo;',
					'title_reply_to'       => __( 'Leave a Reply to %s', 'woocommerce' ),
					'comment_notes_before' => '',
					'comment_notes_after'  => '',
					'fields'               => array(
						'author' => '<p class="comment-form-author">' . '<label for="author" class="col-md-3">' . __( 'Name', 'woocommerce' ) . ' <span class="required">*</span></label> ' .
						            '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" aria-required="true" class="form-control"/></p>',
						'email'  => '<p class="comment-form-email"><label for="email" class="col-md-3">' . __( 'Email', 'woocommerce' ) . ' <span class="required">*</span></label> ' .
						            '<input id="email" name="email" type="text" class="form-control" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-required="true" /></p>',
					),
					'label_submit'  => __( 'Submit', 'woocommerce' ),
					'logged_in_as'  => '',
					'comment_field' => ''
				);

				if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' ) {
					$comment_form['comment_field'] = '<p class="comment-form-rating"><label for="rating">' . __( 'Your Rating', 'woocommerce' ) .'</label><select name="rating" id="rating">
						<option value="">' . __( 'Rate&hellip;', 'woocommerce' ) . '</option>
						<option value="5">' . __( 'Perfect', 'woocommerce' ) . '</option>
						<option value="4">' . __( 'Good', 'woocommerce' ) . '</option>
						<option value="3">' . __( 'Average', 'woocommerce' ) . '</option>
						<option value="2">' . __( 'Not that bad', 'woocommerce' ) . '</option>
						<option value="1">' . __( 'Very Poor', 'woocommerce' ) . '</option>
					</select></p>';
				}

				$comment_form['comment_field'] .= '<p class="comment-form-comment"><label for="comment" class="col-md-3">Comentário *</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" class="form-control"></textarea></p>';

				comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
				*/
			?>
			</div>
		</div>
      </div>

      <div class="modal-footer">
      	<p style="font-size:10px; font-family: arial;margin: 0;"><strong>SEU EMAIL NUNCA SERÁ PUBLICADO OU DISTRIBUÍDO.<br> OS CAMPOS COM (*) SÃO OBRIGATÓRIOS.</strong></p>
        <a type="button" class="btn btn-default" data-dismiss="modal">Fechar</a>
      </div>

    </div>
  </div>
</div>
		

	<?php else : ?>

		<p class="woocommerce-verification-required"><?php _e( 'Only logged in customers who have purchased this product may leave a review.', 'woocommerce' ); ?></p>

	<?php endif; ?>

	<div class="clear"></div>
</div>