<?php
/**
 * Plugin Name: NotWiz Ruby Text
 * Description: Ruby Text for Block Editor(Gutenberg)
 * Version: 1.1.1
 * PHP Version: 7.0.0
 * Text Domain: notwiz-ruby-text
 * Domain Path: /languages
 * Author: kmix39
 * Author URI: https://not-wiz.net
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

namespace NotWiz_Ruby_Text;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use NotWiz_Ruby_Text\App\Common;
use NotWiz_Ruby_Text\App\Settings;
use NotWiz_Ruby_Text\App\Controller;

class Bootstrap {

	function __construct() {
		add_action( 'plugins_loaded', [ __CLASS__, '_plugins_loaded' ] );
	}

	static function _init_settings() {
		$_plugin_info = get_file_data(
			__FILE__,
			[
				'plugin_name' => 'Plugin Name',
				'description' => 'Description',
				'version'     => 'Version',
				'php_version' => 'PHP Version',
				'text_domain' => 'Text Domain',
				'domain_path' => 'Domain Path',
				'author'      => 'Author',
				'author_uri'  => 'Author URI',
				'license'     => 'License',
				'license_uri' => 'License URI',
			]
		);
		$_plugin_info[ 'root_file' ] = __FILE__;
		$_settings_plugin = Settings\Plugin::_instance();
		$_settings_plugin->_init_settings( $_plugin_info );
	}

	public static function _plugins_loaded() {
		self::_init_settings();
		new Common\Text_Domain;
		new Controller\Editor;
	}
}

require_once( __DIR__ . '/App/Common/Text_Domain.php' );
require_once( __DIR__ . '/App/Controller/Editor.php' );
require_once( __DIR__ . '/App/Settings/Plugin.php' );

new \NotWiz_Ruby_Text\Bootstrap();
