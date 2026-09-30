<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<div class="wpenh-property-login">
    <div class="wpenh-property-login-container">
        <div class="wpenh-property-login__inner">
                <h3>Sign In</h3>
                
            <?php
            wp_login_form( array(
                'redirect' => get_permalink()
            ) ); 
             ?>
             
        </div>

        <div class="wpenh-property-registration__inner">
            <form method="POST" action="" class="enh-registration-form">
                
                 <div class="">
                    <label>
                        <h3>Sign Up</h3>
                    </label>
                 </div>
                 <div class="">
                    <label>
                        <span>Firstname</span>
                        <input type="text" name="firstname" class="enh-firstname-field" />
                    </label>
                 </div>   
                 <div class="">
                     <label>
                        <span>Lastname</span>
                        <input type="text" name="lastname" class="enh-lastname-field" />
                     </label>
                 </div>
                 <div class="">
                     <label>
                       <span>Email</span>
                         <input type="email" name="email" class="enh-email-field" />
                     </label>
                 </div>
                 <div class="">
                     <label>
                         <span>Password</span>
                            <input type="password" name="password" class="enh-password-field"/>
                     </label>
                 </div>
                    <div class="field-container">
                       <div class="wpenh-property-registration">
                            <input class="register_submit_button" type="Submit" name="Submit" value="Register"/>
                        </div>
                    </div>


            </form>
        </div>
    </div>
</div>


