<?php
/**
 * Fired when the plugin is uninstalled.
 *
 * @package   spectrom-get-lead-source
 * @author    Oliver Ong <tefiri@gmail.com>
 * @license   GPL-2.0+
 * @link      http://zholpe.com
 * @copyright 9-19-2014 Spectrom
 */

// If uninstall, not called from WordPress, then exit
if (!defined("WP_UNINSTALL_PLUGIN"))
{
	exit;
}

// TODO: Define uninstall functionality here