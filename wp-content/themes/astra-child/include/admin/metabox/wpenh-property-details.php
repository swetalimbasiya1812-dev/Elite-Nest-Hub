
<?php
/**
 * property details metabox fields
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;


global $post;

// Get the post id
$post_id = ( $post->ID ) ? $post->ID : '';

$price	= get_post_meta( $post_id, '_property_price', true );
$type	= get_post_meta( $post_id, '_property_type', true );
$location	= get_post_meta( $post_id, '_property_location', true );
$furnished_type	= get_post_meta( $post_id, '_property_furnished_type', true );
$bed	= get_post_meta( $post_id, '_property_bed', true );
$bath	= get_post_meta( $post_id, '_property_bath', true );
$square_feet	= get_post_meta( $post_id, '_property_square_feet', true );
$contact_number = get_post_meta( $post_id, '_property_contact_number', true );
$email	= get_post_meta( $post_id, '_property_email', true );

?>

<div class="wpproperty-property-details-wrap">
	<table class="form-table">
		<tr>
			<th><?php esc_html_e( 'Price', 'wpproperty' ); ?></th>
			<td>
				<input value="<?php echo esc_attr( $price ); ?>" name="_property_price" type="text" class="regular-text"/>
			</td>
		</tr>
		<tr>
			<th><?php esc_html_e( 'Type', 'wpproperty' ); ?></th>
			<td>
                <select name="_property_type">
                    <option value="sell" <?php selected('sell', $type); ?>>sell</option>
                    <option value="rent" <?php selected('rent', $type); ?>>rent</option>
                </select>
			</td>
		</tr>
		<tr>
			<th><?php esc_html_e( 'Location', 'wpproperty' ); ?></th>
			<td>
				<textarea name="_property_location"><?php echo $location; ?></textarea>
			</td>
		</tr>
        <tr>
			<th><?php esc_html_e( 'Furnished_type', 'wpproperty' ); ?></th>
			<td>
				<input value="<?php echo esc_attr( $furnished_type); ?>" name="_property_furnished_type" type="text" class="regular-text"/>
			</td>
		</tr>
		<tr>
			<th><?php esc_html_e( 'Bed', 'wpproperty' ); ?></th>
			<td>
				<select name="_property_bed">
					<option value="1" <?php selected('1', $bed ); ?>>1</option>
					<option value="2" <?php selected('2', $bed ); ?>>2</option>
					<option value="3" <?php selected('3', $bed ); ?>>3</option>
					<option value="4" <?php selected('4', $bed ); ?>>4</option>
					<option value="5" <?php selected('5', $bed ); ?>>5</option>
       			</select>
			</td>
		</tr>
		<tr>
			<th><?php esc_html_e( 'Bath', 'wpproperty' ); ?></th>
			<td>
			<select name="_property_bath">
					<option value="1" <?php selected('1', $bath ); ?>>1</option>
					<option value="2" <?php selected('2', $bath ); ?>>2</option>
					<option value="3" <?php selected('3', $bath ); ?>>3</option>
					<option value="4" <?php selected('4', $bath ); ?>>4</option>
					<option value="5" <?php selected('5', $bath ); ?>>5</option>
                </select>
			</td>
		</tr>
		<tr>
			<th><?php esc_html_e( 'Square_Feet', 'wpproperty' ); ?></th>
			<td>
				<input value="<?php echo esc_attr( $square_feet ); ?>" name="_property_square_feet" type="text" class="regular-text"/>
			</td>
		</tr>
		<tr>
			<th><?php esc_html_e( 'Contact_number', 'wpproperty' ); ?></th>
			<td>
				<input value="<?php echo esc_attr( $contact_number); ?>" name="_property_contact_number" type="text" class="regular-text"/>
			</td>
		</tr>
		<tr>
			<th><?php esc_html_e( 'Email', 'wpproperty' ); ?></th>
			<td>
				<input value="<?php echo esc_attr( $email ); ?>" name="_property_email" type="text" class="regular-text"/>
			</td>
		</tr>

	</table>
</div>
