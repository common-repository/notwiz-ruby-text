<?php
namespace NotWiz_Ruby_Text\App\Settings;

final class Plugin {

	private function __construct() {
	}

	static function _instance() {
		static $_instance = null;
		if ( null === $_instance ) {
			$_instance = new Plugin;
		}
		return $_instance;
	}

	function __set( $_name, $_value ) {
		$this->$_name = $_value;
	}

	function __get( $_name ) {
		if ( property_exists( $this, $_name ) ) {
			return $this->$_name;
		}
		return null;
	}

	function _init_settings( $_info_settings = [] ) {
		$this->root_file = $_info_settings[ 'root_file' ];
		$this->dir_url   = untrailingslashit( plugin_dir_url( $_info_settings[ 'root_file' ] ) );
		$this->dir_path  = untrailingslashit( plugin_dir_path( $_info_settings[ 'root_file' ] ) );
		$this->name        = $_info_settings[ 'plugin_name' ];
		$this->description = $_info_settings[ 'description' ];
		$this->version     = $_info_settings[ 'version' ];
		$this->php_version = $_info_settings[ 'php_version' ];
		$this->text_domain = $_info_settings[ 'text_domain' ];
		$this->domain_path = $_info_settings[ 'domain_path' ];
		$this->author      = $_info_settings[ 'author' ];
		$this->author_uri  = $_info_settings[ 'author_uri' ];
		$this->license     = $_info_settings[ 'license' ];
		$this->license_uri = $_info_settings[ 'license_uri' ];
	}

}
