<?php
/**
 * Plugin Name: WP Sharp Images
 * Plugin URI: https://otha.me?wp=wp-sharp-images
 * Description: A WordPress plugin that disables image compression, preserving original quality by setting JPEG compression to 100% and optionally disabling automatic image resizing.
 * Version: 1.0.0
 * Author: Othmane N.
 * Author URI: https://otha.me
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: wp-sharp-images
 */

// Set JPEG quality to 100 (no compression)
add_filter('jpeg_quality', function($quality) {
    return 100;
});

// Alternative way to set quality for wp_editor image operations
add_filter('wp_editor_set_quality', function($quality) {
    return 100;
});

// Disable creation of additional image sizes
function disable_image_sizes($sizes) {
    // Return an empty array to disable all additional sizes
    // Or you can selectively keep certain sizes by returning them
    return array();
}
add_filter('intermediate_image_sizes_advanced', 'disable_image_sizes');

// Disable scaling of big images (WordPress 5.3+)
add_filter('big_image_size_threshold', '__return_false');