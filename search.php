<?php get_header(); ?>
	

						<h1 class="archive-title"><span><?php _e( 'Buscando por:', 'b4wtheme' ); ?></span> <?php echo esc_attr(get_search_query()); ?></h1>

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

								<header class="article-header">

									<h3 class="search-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
									<p class="byline vcard"><?php
										printf( __( 'Postado <time class="updated" datetime="%1$s" pubdate>%2$s</time>, por <span class="author">%3$s</span> <span class="amp">e</span> arquivado em %4$s.', 'b4wtheme' ), get_the_time( 'Y-m-j' ), get_the_time( __( 'F jS, Y', 'b4wtheme' ) ), b4w_get_the_author_posts_link(), get_the_category_list(', ') );
									?></p>

								</header>

								<section class="entry-content">
										<?php the_excerpt( '<span class="read-more">' . __( 'Read more &raquo;', 'b4wtheme' ) . '</span>' ); ?>
								</section>

							</article>

						<?php endwhile; ?>

								<?php if (function_exists('b4w_page_navi')) { ?>
										<?php b4w_page_navi(); ?>
								<?php } else { ?>
										<nav class="wp-prev-next">
												<ul class="clearfix">
													<li class="prev-link"><?php next_posts_link( __( '&laquo; Older Entries', 'b4wtheme' )) ?></li>
													<li class="next-link"><?php previous_posts_link( __( 'Newer Entries &raquo;', 'b4wtheme' )) ?></li>
												</ul>
										</nav>
								<?php } ?>

							<?php else : ?>

									<article id="post-not-found" class="hentry clearfix">
										<header class="article-header">
											<h1><?php _e( 'Desculpe, Nenhum resultado encontrado.', 'b4wtheme' ); ?></h1>
										</header>
										<section class="entry-content">
											<p><?php _e( 'Tente pesquisar novamente.', 'b4wtheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the search.php template.', 'b4wtheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</br></br></br></br></br>
			

<?php get_footer(); ?>
