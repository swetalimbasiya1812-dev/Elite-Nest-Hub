<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $wp_query;

$post_id = get_query_var( 'editprop' );
$post_id = ! empty( $post_id ) ? $post_id : 0;

$title = $description = $price = $type = '';
$location = $furnished_type = $bed = $bath = '';
$square_feet = $contact_number = $email = '';
if ( ! empty( $post_id ) && 0 !== $post_id ) {
    $title          = get_the_title( $post_id, '_property_title',true);
    $description    = get_the_content($post_id,'_property_description',true);
    $description    = apply_filters('the_content', $description);
    $price	        = get_post_meta( $post_id, '_property_price', true );
    $type	        = get_post_meta( $post_id, '_property_type', true );
    $location	    = get_post_meta( $post_id, '_property_location', true );
    $furnished_type	= get_post_meta( $post_id, '_property_furnished_type', true );
    $bed	        = get_post_meta( $post_id, '_property_bed', true );
    $bath	        = get_post_meta( $post_id, '_property_bath', true );
    $square_feet	= get_post_meta( $post_id, '_property_square_feet', true );
    $contact_number = get_post_meta( $post_id, '_property_contact_number', true );
    $email	        = get_post_meta( $post_id, '_property_email', true );
}
?>

<div class="wpenh-property-form-container">
    <div class="wpenh-property-form__inner">
        <div class="wpenh-manage-property-form">
             <form method="POST" action="" class="enh-manage-property-form">

                <input type="hidden" name="post_id" value="<?php echo $post_id; ?>" class="enh-post_id-field" />

                <h2>Property-Details</h2>
                 <div class="wpenh-form-field-column-form">
                    <label>
                        <span>Title</span>
                        <input value="<?php echo esc_attr($title); ?> " type="text" name="title" class="enh-title-field" />
                    </label>
                </div>
                <div class="wpenh-form-field-column-form">     
                    <label>
                        <span>Description</span>
                        <textarea name="description" class="enh-description-field"><?php echo esc_attr($description); ?></textarea>
                    </label>
                </div>
                <div class="wpenh-property-row">
                    <div class="wpenh-form-field-column">
                        <div class="">
                            <label>
                                <span>Price</span>
                                <input value="<?php echo $price; ?>" type="text" name="price" class="enh-price-field"/>
                            </label>
                        </div>
                     </div>
                    <div class="wpenh-form-field-column">
                        <div class="">
                            <label>
                                <span>Type</span>
                                    <select name="type" class="enh-type-field">
                                        <option value="sell"<?php selected('sell',$type); ?>>sell</option>
                                        <option value="rent"<?php selected('rent',$type); ?>>rent</option>
                                    </select>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="wpenh-form-field-column-form">
                    <label>
                        <span>Location</span>
                        <textarea class="enh-location-field"><?php echo $location; ?></textarea>
                    </label>
                </div>
                <div class="wpenh-form-field-column-form">
                    <label>
                        <span>Furnished Type</span>
                 <input value="<?php echo esc_attr( $furnished_type); ?>" type="text" name="Furnished Type" class="enh-furnished_type-field" />
                    </label>
                </div>
                <div class="wpenh-property-row">
                    <div class="wpenh-form-field-column">
                        <label>
                            <span>Bed</span>
                            <select name="bed" class="enh-bed-field">
                                <option value="1"<?php selected('1', $bed ); ?>>1</option>
                                <option value="2"<?php selected('2', $bed ); ?>>2</option>
                                <option value="3"<?php selected('3', $bed ); ?>>3</option>
                                <option value="4"<?php selected('4', $bed ); ?>>4</option>
                                <option value="5"<?php selected('5', $bed ); ?>>5</option>
                            </select>
                        </label>
                    </div>
                    <div class="wpenh-form-field-column">
                        <label>
                            <span>Bath</span>
                            <select name="bath" class="enh-bath-field">
                                <option value="1"<?php selected('1', $bath); ?>>1</option>
                                <option value="2"<?php selected('2', $bath); ?>>2</option>
                                <option value="3"<?php selected('3', $bath); ?>>3</option>
                                <option value="4"<?php selected('4', $bath); ?>>4</option>
                                <option value="5"<?php selected('5', $bath); ?>>5</option>
                            </select>
                        </labdel>
                    </div>
                 </div>
                <div class="wpenh-form-field-column-form">
                    <label>
                        <span>Square_feet</span>
                        <input value="<?php echo esc_attr( $square_feet);?>" type="text" name="square_feet" class="enh-square_feet-field" />
                    </label>
                </div>
                <div class="wpenh-property-row">
                    <div class="wpenh-form-field-column">
                        <label>
                            <span>Contact_number</span>
                            <input value="<?php echo esc_attr( $contact_number); ?>" type="text" name="Contact_number" class="enh-contact_number-field" />
                        </label>
                    </div>
                    <div class="wpenh-form-field-column">
                        <label>
                            <span>Email</span>
                            <input value="<?php echo esc_attr( $email); ?>"type="text" name="Email" class="enh-email-field" />
                        </label>
                    </div>
                </div>       
                <div class="wpenh-property-submit-button">
                    <div class="">
                        <input type="Submit" name="Submit"/>
                    </div>
                </div>     
            </form>
        </div>
    </div>
</div>

