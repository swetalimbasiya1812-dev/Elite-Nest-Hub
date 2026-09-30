<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

<?php if ( astra_page_layout() == 'left-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

	<div id="primary" <?php astra_primary_class(); ?>>

		<?php astra_primary_content_top(); ?>

		<?php //astra_content_loop(); ?>
        <main id="main" class="site-main">
        <?php
        if ( have_posts() ) :
            do_action( 'astra_template_parts_content_top' );

            while ( have_posts() ) :
                the_post();
				$post_id = get_the_ID();
				?>
					<?php astra_entry_before(); ?>
					<article
						<?php
						echo astra_attr(
							'article-single',
							array(
								'id'    => 'post-' . get_the_id(),
								'class' => join( ' ', get_post_class() ),
							)
						); ?>
					>

						<?php astra_entry_top(); ?>
						<?php //astra_entry_content_single(); ?>

						
							<?php astra_single_header_after(); ?>
							<div class="entry-content clear"
								<?php
								echo astra_attr(
									'article-entry-content-single-layout',
									array( 'class' => '', )
								); ?>
							>
								<?php astra_entry_content_before(); ?>
								<?php the_content(); ?>
								<?php astra_entry_content_after(); ?>
								
								<div class="property-more-detail-section ast-article-single mb-30">
									<h5>More Details</h5>
									<div class="property-more-detail-block">
										<div class="more-detail-item">
											<span><strong>Price</strong></span>
											<span><?php
												$price = get_post_meta( $post_id, '_property_price', true );
												echo $price;
											?></span>
										</div>
										<div class="more-detail-item">
											<span><strong>Type</strong></span>
											<span><?php
												$type = get_post_meta( $post_id, '_property_type', true );
												echo $type;
											?></span>
										</div>
										<div class="more-detail-item">
											<span><strong>Bed</strong></span>
											<span><?php
											$bed = get_post_meta( $post_id, '_property_bed',true);
											echo $bed;
											?></span>
										</div>
										<div class="more-detail-item">
											<span><strong>Baths</strong></span>
											<span><?php
											$bath = get_post_meta( $post_id, '_property_bath',true);
											echo $bath;
											?></span>
										</div>
										<div class="more-detail-item">
											<span><strong>Furnished Type</strong></span>
											<span><?php
											$furnished_type = get_post_meta($post_id, '_property_furnished_type',true);
											echo $furnished_type ?></span>
										</div>
										<div class="more-detail-item">
											<span><strong>Square feet</strong></span>
											<span><?php
											$square_feet = get_post_meta($post_id,'_property_square_feet',true);
											echo $square_feet ?></span>
										</div>
										
                                    </div>
           						</div>

								<?php
								wp_link_pages(
									array(
										'before'      => '<div class="page-links">' . esc_html( astra_default_strings( 'string-single-page-links-before', false ) ),
										'after'       => '</div>',
										'link_before' => '<span class="page-link">',
										'link_after'  => '</span>',
									)
								); ?>
							</div><!-- .entry-content .clear -->
						</div>

						<?php astra_entry_bottom(); ?>
					</article><!-- #post-## -->

					<?php //astra_entry_after(); ?>
				<?php
                endwhile;
            do_action( 'astra_template_parts_content_bottom' );
            else :
                do_action( 'astra_template_parts_content_none' );
            endif;
            ?>
    </main><!-- #main -->

		<?php astra_primary_content_bottom(); ?>

	</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>