<?php
// Load WordPress.
define( 'WP_USE_THEMES', false );
require_once( 'wp-load.php' );

// Check if user is logged in.
if ( ! is_user_logged_in() ) {
    wp_redirect( home_url() );
    exit;
}

// Check if user has the necessary capability.
if ( ! current_user_can( 'manage_options' ) ) {
    wp_redirect( home_url() );
    exit;
}

// Load header.
get_header();

// Load content.
echo '<div id="alligator-page">';
echo '<h2>Alligator Plugin Settings</h2>';
echo '<p>Modify the settings for the Alligator plugin.</p>';
echo '<form method="post" action="' . esc_url( admin_url( 'admin-post.php' ) ) . '">';
echo '<label for="alligator-size">Alligator Size:</label>';
echo '<select id="alligator-size" name="alligator_size">';
echo '<option value="small">Small</option>';
echo '<option value="medium">Medium</option>';
echo '<option value="large">Large</option>';
echo '</select>';
echo '<br />';
echo '<label for="alligator-color">Alligator Color:</label>';
echo '<select id="alligator-color" name="alligator_color">';
echo '<option value="green">Green</option>';
echo '<option value="brown">Brown</option>';
echo '<option value="gray">Gray</option>';
echo '</select>';
echo '<br />';
echo '<input type="submit" value="Save Settings" />';
echo '<input type="hidden" name="action" value="save_alligator_settings" />';
echo wp_nonce_field( 'save_alligator_settings', '_wpnonce', true, false );
echo '</form>';
echo '</div>';

// Load footer.
get_footer();
