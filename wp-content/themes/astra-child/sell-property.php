<?php
/**
 * Template Name: Sell-Property
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
    <?php astra_content_page_loop(); ?>
    <?php astra_primary_content_bottom(); ?>
    
    <main id="main" class="site-main">

    <div class="ast-grid-3 ast-blog-layout-4-grid">
    <?php
        $args = array(
            'post_type' => 'property',
            'posts_per_page' => -1,
            'meta_query' => array(
                array(
                    'key' => '_property_type',
                    'value'   => 'sell',
                    'compare' => '='
                )
            )
        );

        // The Query.
        $the_query = new WP_Query( $args );

        // The Loop.
        if ( $the_query->have_posts() ) {
    ?>
    <div class="ast-row">
        <?php
        while ( $the_query->have_posts() ) :
            $the_query->the_post();
            $post_id = get_the_ID();
        ?>
        <article
            <?php
                echo astra_attr(
                    'article-content ',
                    array(
                        'id'    => 'post-' . get_the_id(),
                        'class' => join( ' ', get_post_class('wpenh-property-loop') ),
                    )
                );
            ?>
            >
            <div <?php astra_blog_layout_class( 'blog-layout-4 ast-article-inner' ); ?>>
                <div class="post-content <?php echo astra_attr( 'ast-grid-common-col' ); ?>" >
                    <?php
                        do_action( 'astra_blog_archive_featured_image_before' );
                        astra_get_blog_post_thumbnail( 'archive' );
                        do_action( 'astra_blog_archive_featured_image_after' );
                        do_action( 'astra_blog_archive_title_before' );
                        astra_get_blog_post_title();
                        do_action( 'astra_blog_archive_title_after' );
                    ?>

                    <div class="wpenh-property-loop-meta">
                        <?php
                            $price = get_post_meta( $post_id, '_property_price', true );
                            if ( ! empty( $price ) ) {
                         ?>
                                <div class="wpenh-property-price">
                                    <span class="wpenh-property-label">
                                        <?php esc_html_e( 'Price', 'wpenh-property-price' ) ?>
                                    </span>
                                    <span class="wpenh-property-value">
                                        <?php echo $price; ?>
                                    </span>
                                </div>
                                <?php } ?>

                                <div class="wpenh-property-icons">
                                    <?php
                                    $bed = get_post_meta( $post_id, '_property_bed', true );
                                    if ( ! empty( $bed) ) { ?>
                                        <span title="Bedrooms" class="icon beds">
                                            <span class="icon-value"><?php echo esc_html( $bed ); ?></span>
                                        </span>
                                    <?php
                                    }

                                    $bath = get_post_meta( $post_id, '_property_bath', true );
                                    if ( ! empty( $bath) ) { ?>
                                        <span title="Bathrooms" class="icon baths">
                                            <span class="icon-value"><?php echo esc_html( $bath ); ?></span>
                                        </span>
                                    <?php } ?>
                                </div>
                            </div>

                            <div>
                                <?php the_excerpt(); ?>
                            </div>
                        <div class="wpenh_btn_container">
                            <div class="wpenh-property-button">
                                    <a href=<?php the_permalink(); ?>>Read More</a>
                            </div>
                            <div class="entry-content clear"
                                <?php
                                echo astra_attr(
                                    'article-entry-content-blog-layout',
                                    array(
                                        'class' => '',
                                    )
                                ); ?>
                            >
                           
                                <?php
                                astra_entry_content_before();
                                astra_entry_content_after();

                                wp_link_pages(
                                    array(
                                        'before'      => '<div class="page-links">' . esc_html( astra_default_strings( 'string-blog-page-links-before', false ) ),
                                        'after'       => '</div>',
                                        'link_before' => '<span class="page-link">',
                                        'link_after'  => '</span>',
                                    )
                                ); ?>

                            </div><!-- .entry-content .clear -->
                        </div><!-- .post-content -->
                    </div> <!-- .blog-layout-4 -->
                   
        </article>

        <?php
            endwhile; ?>
    </div>
    <?php
    } else {
        esc_html_e( 'Sorry, you do not have any properties.' );
    }

    // Restore original Post Data.
    wp_reset_postdata(); ?>

</div>

    </main><!-- #main -->

<?php astra_pagination(); ?>

<?php astra_primary_content_bottom(); ?>

</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

<?php get_sidebar(); ?>

<?php endif ?>


<?php
get_footer();