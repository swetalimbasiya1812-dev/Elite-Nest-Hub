<?php
/**
 * 
 */
?>
<div class="ast-grid-3 ast-blog-layout-4-grid">
    <?php
        $args = array(
            'post_type' => 'property',
            'posts_per_page' => -1,
            'author' => get_current_user_id()
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
                        if(has_post_thumbnail()){
                             astra_get_blog_post_thumbnail( 'archive' );
                        }else{ ?>
                            <div class="ast-blog-featured-section post-thumb ast-blog-single-element">
                                <div class="post-thumb-img-content post-thumb">
                                    <img src="<?php echo get_stylesheet_directory_uri() ?>\images\build.jpeg" />
                                </div>
                            </div>
                            <?php }

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
                            <div class="btn">
                                <a href="<?php echo site_url( '/manage-property/editprop/' . $post_id ); ?>">Edit</a>
                                <a href="#" data-property_id="<?php echo esc_attr( $post_id ); ?>" class="enh-btn-delete">Delete</a>
                            </div>
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
