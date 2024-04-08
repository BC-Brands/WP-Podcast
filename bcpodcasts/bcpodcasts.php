<?php
/**
 * Plugin Name: BC Podcasts
 * Plugin URI:  https://host.bcwd.site/podcasts
 * Description: BC Podcasts v2 for WordpPress. An open source Podcast Manager.
 * Author:      BC Brands
 * Author URI:  https://bcwd.site
 * Version:     1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Text Domain:       bcpodcasts
 * License:           GPL v3 or later
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 *
 * BC Podcasts is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * any later version.
 *
 * BC Podcasts is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with BC Podcasts. If not, see <http://www.gnu.org/licenses/>.
 */

// DISABLE ABSPATH
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

// PLUGIN ACTIVATION

 /**
 * Register the "podcast" and "episode" custom post type
 */
function bcpodcasts_setup_post_type() {
	register_post_type( 'podcast', ['public' => true ] ); 
    register_post_type( 'episode', ['public' => true ] ); 
} 
add_action( 'init', 'bcpodcasts_setup_post_type' );


/**
 * Activate the plugin.
 */
function bcpodcasts_activate() { 
	// Trigger our function that registers the custom post type plugin.
	bcpodcasts_setup_post_type(); 
	// Clear the permalinks after the post type has been registered.
	flush_rewrite_rules(); 
}
register_activation_hook( __FILE__, 'bcpodcasts_activate' );

// PLUGIN DEACTIVATION

/**
 * Deactivation hook.
 */
function bcpodcasts_deactivate() {
	// Unregister the post type, so the rules are no longer in memory.
	unregister_post_type( 'podcast' );
    unregister_post_type( 'episode' );
	// Clear the permalinks to remove our post type's rules from the database.
	flush_rewrite_rules();
}
register_deactivation_hook( __FILE__, 'bcpodcasts_deactivate' );
?>