jQuery( document ).ready( function( $ ) {

    // Login form submit.
    $( document ).on( 'submit', '.enh-registration-form', function(e) {
        e.preventDefault();

        var formObj = $( this );
        var firstname = formObj.find( '.enh-firstname-field' ).val();
        var lastname = formObj.find( '.enh-lastname-field' ).val();
        var email = formObj.find( '.enh-email-field' ).val();
        var password = formObj.find( '.enh-password-field' ).val();

        if ( ! firstname ) {
            alert( 'Please enter your firstname.' );
            return false;
        }
        if ( ! email ) {
            alert( 'Please enter your email.' );
            return false;
        }
        if ( ! password ) {
            alert( 'Please enter your password.' );
            return false;
        }

        $.ajax( {
            type: "post",
            url: wpenh_object.ajaxurl,
            data: {
                'action': 'wpenh_register_user',
                'firstname': firstname,
                'lastname': lastname,
                'email': email,
                'password': password
            },
            success: function( response ) {
                alert( response.message );
                if ( response.success && 'true' === response.success ) {
                    // Success registration.
                    formObj[0].reset();
                } else {
                    // fail registration.
                }
            }
        } );

        return false;
    } );

    // Property form submit.
    $(document).on('submit','.enh-manage-property-form',function(e){
        e.preventDefault();

        var formObj = $(this);
        var post_id = formObj.find('.enh-post_id-field').val();
        var title = formObj.find('.enh-title-field').val();
        var description = formObj.find('.enh-description-field').val();
        var price = formObj.find('.enh-price-field').val();
        var type = formObj.find('.enh-type-field').val();
        var location= formObj.find('.enh-location-field').val();
        var furnished_type= formObj.find('.enh-furnished_type-field').val();
        var bed= formObj.find('.enh-bed-field').val();
        var bath= formObj.find('.enh-bath-field').val();
        var square_feet = formObj.find('.enh-square_feet-field').val();
        var contact_number = formObj.find('.enh-contact_number-field').val();
        var email = formObj.find('.enh-email-field').val();
        
        if(! title){
            alert('Please enter your title.');
            return false;
        }
        if(! description){
            alert('Please enter your description.');
            return false;
        }
        if(! price){
            alert('Please enter your price.');
            return false;
        }
        if(! type){
            alert('Please select your type.');
            return false;
        }
        if(! location){
            alert('Please enter your location.');
            return false;
        }
        if(! furnished_type){
            alert('Please enter your furnished_type.');
            return false;
        }
        if(! bed){
            alert('Please enter your bed.');
            return false;
        }
        if(! bath){
            alert('Please enter your bath.');
            return false;
        }
        if(! square_feet){
            alert('Please enter your square_feet.');
            return false;
        }
        if(! contact_number){
            alert('Please enter your contact_number.');
            return false;
        }
        if(! email){
            alert('Please enter your email.');
            return false;
        }
        $.ajax( {
            type: "post",
            url: wpenh_object.ajaxurl,
            data: {
                'action': 'wpenh_manage_property',
                'post_id': post_id,
                'title': title,
                'description': description,
                'price': price,
                'type': type,
                'location': location,
                'furnished_type': furnished_type,
                'bed': bed,
                'bath': bath,
                'square_feet': square_feet,
                'contact_number': contact_number,
                'email': email
            },
            success: function( response ) {
                alert( response.message );
                if ( response.success && 'true' === response.success ) {
                    // Success registration.
                    formObj[0].reset();
                } else {
                    // fail registration.
                }
            }
        } );
    } );

    // Delete property,
    $(document).on( 'click', '.wpenh-property-loop .enh-btn-delete', function(e) {
        e.preventDefault();
        let $this = $( this );

        let property_id = $this.data( 'property_id' );

        if ( ! property_id ) {
            alert( 'Property not found, please try again!' );
            window.location.reload(true);
            return;
        }

        $this.prop( 'disabled', true );
        
        $.ajax( {
            type: "post",
            url: wpenh_object.ajaxurl,
            data: {
                action: 'wpenh_delete_property',
                property_id: property_id
            },
            success: function( response ) {
                alert( response.message );
                if ( response.success && 'true' === response.success ) {
                    // Success registration.
                    $this.parents( '.ast-article-inner' ).css( 'background', '#f6e5e5' );
                    $this.parents( 'article.wpenh-property-loop' ).fadeOut();
                } else {
                    // fail deletation.
                }
                $this.prop( 'disabled', false );
            }
        } );

        return false;
    } );
} );
