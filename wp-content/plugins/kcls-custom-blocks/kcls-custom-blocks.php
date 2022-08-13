<?php
/**
 * Plugin Name:       KCLS Voice Custom Blocks
 * Description:       Custom blocks for KCLS Voice theme.
 * Requires at least: 5.9
 * Requires PHP:      7.0
 * Version:           1.0.0
 * Author:            Two Dogs Web Development
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       kcls-custom-blocks
 *
 * @package           create-block
 */

function create_block_kcls_custom_blocks_block_init() {
	register_block_type( __DIR__ . '/build' );
}

add_action( 'init', 'create_block_kcls_custom_blocks_block_init' );
