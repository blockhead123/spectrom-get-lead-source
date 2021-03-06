<?php
/**
 * Spectrom Get Lead Source
 *
 * @package   spectrom-get-lead-source
 * @author    Oliver Ong <tefiri@gmail.com>
 * @license   GPL-2.0+
 * @link      http://zholpe.com
 * @copyright 9-19-2014 Spectrom
 */

/**
 * Spectrom Get Lead Source class.
 *
 * @package SpectromGetLeadSource
 * @author  Oliver Ong <tefiri@gmail.com>
 */
class SpectromGetLeadSource{
	/**
	 * Plugin version, used for cache-busting of style and script file references.
	 *
	 * @since   1.0.0
	 *
	 * @var     string
	 */
	protected $version = "1.0.0";

	/**
	 * Unique identifier for your plugin.
	 *
	 * Use this value (not the variable name) as the text domain when internationalizing strings of text. It should
	 * match the Text Domain file header in the main plugin file.
	 *
	 * @since    1.0.0
	 *
	 * @var      string
	 */
	protected $plugin_slug = "spectrom-get-lead-source";

	/**
	 * Instance of this class.
	 *
	 * @since    1.0.0
	 *
	 * @var      object
	 */
	protected static $instance = null;

	/**
	 * Slug of the plugin screen.
	 *
	 * @since    1.0.0
	 *
	 * @var      string
	 */
	protected $plugin_screen_hook_suffix = null;

	/**
	 * Initialize the plugin by setting localization, filters, and administration functions.
	 *
	 * @since     1.0.0
	 */
	private function __construct()
    {

        // Load plugin text domain
		add_action("init", array($this, "load_plugin_textdomain"));

		// Add the options page and menu item.
		add_action("admin_menu", array($this, "add_plugin_admin_menu"));

        // Load GET params validations
        add_action('init', array($this, "get_params_validation"));
        add_filter('spectrom_get_lead_src', array($this, "get_lead_source"));


        // Define ShortCodes.
        add_shortcode( 'spectrom_get_lead_src', array($this, "get_lead_src_shortcode") );

	}

    /**
     * Validates GET Params Value also sanitize the value
     *
     * @since 1.0.0
     *
     */
    public function get_params_validation()
    {

        if(isset($_GET['lead_src'])){
            $lead_src = filter_var($_GET['lead_src'], FILTER_SANITIZE_STRING);
            if(trim($lead_src) != ''){
                setcookie('lead_src',$lead_src);
            }
        }

    }

    /**
	 * Return an instance of this class.
	 *
	 * @since     1.0.0
	 *
	 * @return    object    A single instance of this class.
	 */
	public static function get_instance()
    {

		// If the single instance hasn"t been set, set it now.
		if (null == self::$instance) {
			self::$instance = new self;
		}

		return self::$instance;
	}

	/**
	 * Fired when the plugin is activated.
	 *
	 * @since    1.0.0
	 *
	 * @param    boolean $network_wide    True if WPMU superadmin uses "Network Activate" action, false if WPMU is disabled or plugin is activated on an individual blog.
	 */
	public static function activate($network_wide)
    {
		// TODO: Define activation functionality here
	}

	/**
	 * Fired when the plugin is deactivated.
	 *
	 * @since    1.0.0
	 *
	 * @param    boolean $network_wide    True if WPMU superadmin uses "Network Deactivate" action, false if WPMU is disabled or plugin is deactivated on an individual blog.
	 */
	public static function deactivate($network_wide)
    {
		// TODO: Define deactivation functionality here
	}

	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain()
    {

		$domain = $this->plugin_slug;
		$locale = apply_filters("plugin_locale", get_locale(), $domain);

		load_textdomain($domain, WP_LANG_DIR . "/" . $domain . "/" . $domain . "-" . $locale . ".mo");
		load_plugin_textdomain($domain, false, dirname(plugin_basename(__FILE__)) . "/lang/");
	}

	/**
	 * Register the administration menu for this plugin into the WordPress Dashboard menu.
	 *
	 * @since    1.0.0
	 */
	public function add_plugin_admin_menu()
    {
		$this->plugin_screen_hook_suffix = add_plugins_page(__("Spectrom Get Lead Source - Administration", $this->plugin_slug),
			__("Spectrom Get Lead Source", $this->plugin_slug), "read", $this->plugin_slug, array($this, "display_plugin_admin_page"));
	}

	/**
	 * Render the settings page for this plugin.
	 *
	 * @since    1.0.0
	 */
	public function display_plugin_admin_page()
    {
		include_once('views/admin.php');
	}

    /**
     * Gets lead source cookie value && attaches it to a filter
     *
     * @since    1.0.0
     * @return   string    Returns 'net2' if not cookie is supplied
     */
    public function get_lead_source()
    {

        $lead_src = 'net2';

        if(isset($_GET["lead_src"])){
            $lead_src_from_source =  filter_var($_GET['lead_src'], FILTER_SANITIZE_STRING);
        }
        else{
            if(isset($_COOKIE['lead_src'])){
                $lead_src_from_source = filter_var($_COOKIE['lead_src'], FILTER_SANITIZE_STRING);
            }
        }
        if(isset($lead_src_from_source)){
            if(trim($lead_src_from_source)!==''){
                $lead_src = $lead_src_from_source;
            }
        }

        return $lead_src;

    }


    /**
     * Gets lead source cookie value and loads it on a shortcode
     *
     * @since    1.0.0
     * @return   string    Returns 'net2' if not cookie is supplied
     */
    public function get_lead_src_shortcode()
    {
        return apply_filters('spectrom_get_lead_src', '');

    }

}