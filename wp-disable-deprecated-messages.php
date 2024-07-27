<?php
/*
Plugin Name:    WP Disable Deprecated Messages
Description:    Piilota Deprecated ilmoitukset debug.log tiedostosta
Version:        1.0
Author:         Parvus
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED);

// Set the custom error handler
// set_error_handler('custom_error_handler');
function custom_error_handler($errno, $errstr, $errfile, $errline) {
    // Check if the error is a deprecated warning
    if (in_array($errno, [E_DEPRECATED, E_USER_DEPRECATED])) {
        // Log the deprecated message to a custom file
        error_log("Deprecated: $errstr in $errfile on line $errline\n", 3, WP_CONTENT_DIR . '/deprecated.log');
        // Return true to indicate that the PHP internal error handler should not be executed
        return true;
    }

    // For other errors, return false to let the default error handler handle it
    return false;
}
