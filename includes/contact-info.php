<?php
/*
 * Options Initialization
 */


add_action('admin_menu', 'pinnacle_company_menu');

function pinnacle_company_menu() {
    add_options_page('Company Information', 'Company Information', 'manage_options', 'inc/options.php', 'company_information_page');
    add_action( 'admin_init', 'register_company_information_settings' );
}
function register_company_information_settings() {
    register_setting('companyoption-group', 'company_name');
    register_setting('companyoption-group', 'company_address_1');
    register_setting('companyoption-group', 'company_address_2');
    register_setting('companyoption-group', 'company_office_number');
    register_setting('companyoption-group', 'company_toll_free_number');
    register_setting('companyoption-group', 'company_fax_number');
    register_setting('companyoption-group', 'company_email');
    register_setting('companyoption-group', 'company_facebook');
    register_setting('companyoption-group', 'company_twitter');
    register_setting('companyoption-group', 'company_linkedin');
    register_setting('companyoption-group', 'company_youtube');
}


function company_information_page() {
    ?>

    <div class="wrap">
        <h2>Company Information</h2>

        <form method="post" action="options.php">
            <?php settings_fields( 'companyoption-group' ); ?>
            <?php do_settings_sections( 'companyoption-group' ); ?>
            <div class="form-group">
                <h2>Company Address</h2>
                <label for="company_name">Company Name</label>
                <input type="text" name="company_name" value="<?php echo esc_attr(get_option('company_name')); ?>" /><br>
                <label for="company_address_1">Street Address</label>
                <input type="text" name="company_address_1" value="<?php echo esc_attr(get_option('company_address_1')); ?>" /><br>
                <label for="compnay_address_2">City, State Zip</label>
                <input type="text" name="company_address_2" value="<?php echo esc_attr(get_option('company_address_2')); ?>" />
            </div>
            <div class="form-group">
                <h2>Company Contact Info</h2>
                <label for="company_office_number">Office Phone Number</label>
                <input type="text" name="company_office_number" value="<?php echo esc_attr(get_option('company_office_number')); ?>" /><br>
                <label for="company_toll_free_number">Toll Free Phone Number</label>
                <input type="text" name="company_toll_free_number" value="<?php echo esc_attr(get_option('company_toll_free_number')); ?>" /><br>
                <label for="company_fax_number">Fax Phone Number</label>
                <input type="text" name="company_fax_number" value="<?php echo esc_attr(get_option('company_fax_number')); ?>" /><br>
                <label for="company_email">Email Address</label>
                <input type="text" name="company_email" value="<?php echo esc_attr(get_option('company_email')); ?>" />
            </div>
            <div class="form-group">
                <h2>Company Social Media</h2>
                <label for="company_facebook">Facebook URL</label>
                <input type="text" name="company_facebook" value="<?php echo esc_attr(get_option('company_facebook')); ?>" /><br>
                <label for="company_twitter">Twitter URL</label>
                <input type="text" name="company_twitter" value="<?php echo esc_attr(get_option('company_twitter')); ?>" /><br>
                <label for="company_linkedin">LinkedIn URL</label>
                <input type="text" name="company_linkedin" value="<?php echo esc_attr(get_option('company_linkedin')); ?>" /><br>
                <label for="company_youtube">YouTube URL</label>
                <input type="text" name="company_youtube" value="<?php echo esc_attr(get_option('company_youtube')); ?>" />
            </div>
            <?php submit_button(); ?>
        </form>
    </div>
<?php } ?>
