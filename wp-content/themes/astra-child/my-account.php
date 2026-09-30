<?php
/**
 * Template Name: My Account
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

<div id="primary" <?php astra_primary_class(); ?>>
    <?php astra_primary_content_top(); ?>
    <?php astra_content_page_loop(); ?>
    <?php astra_primary_content_bottom(); ?>

    <?php
    if ( ! is_user_logged_in() ) {
        get_template_part( 'template-parts/form', 'login' );
    } else { 
        $current_user = wp_get_current_user(); ?>
        <div class="wpenh_welcome">Welcome <?php echo $current_user->display_name; ?></div>
        <ul class="wpenh-user-dashboard-menu">
            <li><a href="<?php echo site_url( '/my-account/' ); ?>" title="My Properties">My Properties </a></li>
            <li><a href="<?php echo site_url( '/manage-property/'); ?>" title="Manage Properrty">Add Property</a></li>
            <li><a href="<?php echo wp_logout_url( site_url( '/my-account/' ) ); ?>" title="Logout">Logout</a></li>
        </ul>
        <?php
        get_template_part( 'template-parts/list', 'property' );
    } ?>
    


</div><!-- #primary -->

<?php
get_footer();
