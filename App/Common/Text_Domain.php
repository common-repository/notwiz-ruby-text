<?php
namespace NotWiz_Ruby_Text\App\Common;

use NotWiz_Ruby_Text\App\Settings;

class Text_Domain {

	function __construct() {
		$_settings_plugin = Settings\Plugin::_instance();
		add_filter(
			'load_textdomain_mofile',
			[ __CLASS__, '_load_textdomain_mofile' ],
			10,
			2
		);
		load_plugin_textdomain(
			$_settings_plugin->text_domain,
			false,
			basename( $_settings_plugin->dir_path ) . $_settings_plugin->domain_path
		);
	}

	public static function _load_textdomain_mofile( $_mo_file, $_domain ) {
		$_settings_plugin = Settings\Plugin::_instance();
		if ( $_settings_plugin->text_domain === $_domain ) {
			$_mo_file_name   = basename( $_mo_file );
			$_local_mo_file = $_settings_plugin->dir_path . $_settings_plugin->domain_path . '/' . $_mo_file_name;
			if ( is_file( $_local_mo_file ) ) {
				return $_local_mo_file;
			}
		}
		return $_mo_file;
	}

}
