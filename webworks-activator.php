<?php
/**
 * Plugin Name:  Webworks required plugins activator
 * Plugin URI:   https://webworks.london
 * Description:  Activates iThemes Security, Litespeed Cache, IWP client, and Webworks Functions. This is for the benefit of your site, our infrastructure and our other users. All sites hosted on CloudWP must run these plugins.
 * Version:      1.1
 * Author:       Webworks UK Ltd
 * Author URI:   https://webworks.london
 * License:      GPLv2 or later
 */

function run_activate_plugin( $plugin ) {
    $current = get_option( 'active_plugins' );
    $plugin = plugin_basename( trim( $plugin ) );

    if ( !in_array( $plugin, $current ) ) {
        $current[] = $plugin;
        sort( $current );
        do_action( 'activate_plugin', trim( $plugin ) );
        update_option( 'active_plugins', $current );
        do_action( 'activate_' . trim( $plugin ) );
        do_action( 'activated_plugin', trim( $plugin) );
    }

    return null;
}
run_activate_plugin( 'better-wp-security/better-wp-security.php' );
run_activate_plugin( 'webworks-functions/webworks-functions.php' );
run_activate_plugin( 'litespeed-cache/litespeed-cache.php' );
run_activate_plugin( 'iwp-client/iwp-client.php' );
