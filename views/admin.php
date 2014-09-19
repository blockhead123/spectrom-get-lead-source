<?php
/**
 * Represents the view for the administration dashboard.
 *
 * This includes the header, options, and other information that should provide
 * The User Interface to the end user.
 *
 * @package   spectrom-get-lead-source
 * @author    Oliver Ong <tefiri@gmail.com>
 * @license   GPL-2.0+
 * @link      http://zholpe.com
 * @copyright 9-19-2014 Spectrom
 */
?>
<div class="wrap">

	<?php screen_icon(); ?>
	<h2><?php echo esc_html( get_admin_page_title() ); ?></h2>

	<!-- TODO: Provide markup for your options page here. -->

    <h3>Instructions:</h3>
    <p>
        To use the plugin insert plugin on a page, post, content using this shortcode [spectrom_get_lead_src].
    </p>

</div>
