<?php
/**
 *Template Name:Manage Property
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

    <?php
        get_template_part('template-parts/form','property' );
    ?>

<?php
get_footer();
