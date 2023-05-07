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
   
