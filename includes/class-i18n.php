<?php
/**
 * Load translations for the plugin.
 *
 * @package    WPFeatherlight
 * @subpackage WPFeatherlight\Includes\Internationalization
 * @author     Robert Neu
 * @copyright  Copyright (c) 2015, WP Site Care
 * @license    GPL-2.0+
 * @since      0.3.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Based on t5-libraries' language loader by Thomas Scholz
 *
 * @link https://github.com/toscho/t5-libraries/blob/master/Core/I18n/Language_Loader.php
 */
class WP_Featherlight_Language_Loader {

	/**
	 * Path to the root plugin file.
	 *
	 * @var string
	 */
	private $plugin_file;

	/**
	 * Name of the text domain.
	 *
	 * @var string
	 */
	private $text_domain;

	/**
	 * Constructor.
	 *
	 * @param string $text_domain  Name of the text domain.
	 * @param string $plugin_file Path to language files.
	 */
	public function __construct( $text_domain, $plugin_file ) {
		$this->text_domain = $text_domain;
		$this->plugin_file = $plugin_file;
	}

	/**
	 * Get the class running!
	 *
	 * @since  0.3.0
	 * @access public
	 * @return void
	 */
	public function run() {
		$this->wp_hooks();
	}

	/**
	 * Hook into WordPress.
	 *
	 * @since  0.3.0
	 * @access protected
	 * @return void
	 */
	protected function wp_hooks() {
		add_action( 'admin_head-plugins.php', array( $this, 'load' ) );
	}

	/**
	 * Loads translation file.
	 *
	 * @since  0.3.0
	 * @access public
	 * @return bool true when the file was found, false otherwise.
	 */
	public function load() {
		return load_plugin_textdomain(
			$this->text_domain,
			false,
			dirname( plugin_basename( $this->plugin_file ) ) . '/languages'
		);
	}

	/**
	 * Remove translations from memory.
	 *
	 * @since  0.3.0
	 * @access public
	 * @return bool true if the text domain was loaded, false if it was not.
	 */
	public function unload() {
		return unload_textdomain( $this->text_domain );
	}

	/**
	 * Whether or not the language has been loaded already.
	 *
	 * @since  0.3.0
	 * @access public
	 * @return bool
	 */
	public function is_loaded() {
		return is_textdomain_loaded( $this->text_domain );
	}
}
