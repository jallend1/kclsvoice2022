<?php
/**
 * Plugin Name:       KCLS Events
 * Description:       Block that displays upcoming union events from the Google Calendar
 * Requires at least: 5.9
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            Two Dogs Web Development
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       kcls-events
 *
 * @package           create-block
 */

function create_block_kcls_events_block_init() {
	register_block_type( __DIR__ . '/build' );
}
add_action( 'init', 'create_block_kcls_events_block_init' );
