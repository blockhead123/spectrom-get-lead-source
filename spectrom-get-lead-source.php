<?php
/**
 * Spectrom Get Lead Source
 *
 * Used to get lead source for Spectrom on GET URL Parameter
 *
 * @package   spectrom-get-lead-source
 * @author    Oliver Ong <tefiri@gmail.com>
 * @license   GPL-2.0+
 * @link      http://zholpe.com
 * @copyright 9-19-2014 Spectrom
 *
 * @wordpress-plugin
 * Plugin Name: Spectrom Get Lead Source
 * Plugin URI:  http://zholpe.com
 * Description: Used to get lead source for Spectrom on GET URL Parameter. Use shortcode on post and pages [spectrom_get_lead_src]
 * Version:     1.0.0
 * Author:      Oliver Ong
 * Author URI:  http://zholpe.com
 * Text Domain: spectrom-get-lead-source-locale
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path: /lang
 */

// If this file is called directly, abort.
if (!defined("WPINC")) {
	die;
}

require_once(plugin_dir_path(__FILE__) . "spectrom-get-lead-source-root.php");

// Register hooks that are fired when the plugin is activated, deactivated, and uninstalled, respectively.
register_activation_hook(__FILE__, array("SpectromGetLeadSource", "activate"));
register_deactivation_hook(__FILE__, array("SpectromGetLeadSource", "deactivate"));

SpectromGetLeadSource::get_instance();