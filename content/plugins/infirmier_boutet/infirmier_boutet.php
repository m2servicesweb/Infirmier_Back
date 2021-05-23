<?php
/**
 * Plugin Name:     Infirmier_Boutet
 * Plugin URI:      PLUGIN SITE HERE
 * Description:     PLUGIN DESCRIPTION HERE
 * Author:          Mikl,Maude,O'clock Fantasy
 * Author URI:      YOUR SITE HERE
 * Text Domain:     infirmier_boutet
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Infirmier_Boutet
 */

// Your code starts here.
if (! defined('WPINC')) {
	http_response_code(404);
	exit;
}

require plugin_dir_path( __FILE__ ) . 'post-types/soin.php';
require plugin_dir_path( __FILE__ ) . 'taxonomies/ingredient.php';
require plugin_dir_path( __FILE__ ) . 'taxonomies/type.php';
require plugin_dir_path( __FILE__ ) . 'roles/administrator.php';
require plugin_dir_path( __FILE__ ) . 'rest-fields/soin-comment-count.php';
require plugin_dir_path( __FILE__ ) . 'rest-endpoints/invite-friend.php';

register_activation_hook(
	__FILE__,
	function() {

		add_administrator_capabilities();
	}
);

register_deactivation_hook(
	__FILE__,
	function() {

		remove_administrator_capabilities();
	}
);
