/*
Plugin Name: Alligator
Plugin URI: http://example.com/
Description: A custom plugin for Alligator.
Version: 1.0
Author: Your Name
Author URI: http://example.com/
License: GPL2
*/
// Load WordPress
define('WP_USE_THEMES', false);
require_once('wp-load.php');

// Connect to the database
global $wpdb;

// Perform a database query
$results = $wpdb->get_results("SELECT * FROM wp_posts");

// Output the results
foreach ($results as $result) {
  echo $result->post_title;
}

function create_alligator_page() {
    // Check if the page already exists
    $alligator_page = get_page_by_title('Alligator');
    if ($alligator_page == null) {
        // Create the page if it doesn't exist
        $alligator_page_id = wp_insert_post(
            array(
                'post_title' => 'Alligator',
                'post_type' => 'page',
                'post_content' => '[alligator_ui]', // This is where you can add the shortcode for your user interface
                'post_status' => 'publish',
            )
        );
    }
}

// Register activation hook
register_activation_hook(__FILE__, 'alligator_activation');

function alligator_activation() {
    // Create Alligator page
    create_alligator_page();

    // Add activation notice
    add_option('alligator_activated', true);
}

// Register deactivation hook
register_deactivation_hook(__FILE__, 'alligator_deactivation');

function alligator_deactivation() {
    // Remove Alligator page
    $alligator_page = get_page_by_title('Alligator');
    if ($alligator_page) {
        wp_delete_post($alligator_page->ID, true);
    }

    // Remove activation notice
    delete_option('alligator_activated');
}

// Add activation notice
add_action('admin_notices', 'alligator_activation_notice');

function alligator_activation_notice() {
    if (get_option('alligator_activated')) {
        ?>
        <div class="notice notice-success is-dismissible">
            <p><?php _e('The Alligator plugin has been activated!'); ?></p>
        </div>
        <?php
        // Remove activation notice
        delete_option('alligator_activated');
    }
}
