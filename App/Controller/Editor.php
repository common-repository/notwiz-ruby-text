<?php
namespace NotWiz_Ruby_Text\App\Controller;

use NotWiz_Ruby_Text\App\Settings;

class Editor {

	function __construct() {
		add_action(
			'enqueue_block_editor_assets',
			[ __CLASS__, '_enqueue_block_editor_assets' ]
		);
	}

	public static function _enqueue_block_editor_assets() {
		$_settings_plugin = Settings\Plugin::_instance();
		wp_enqueue_script(
			'notwiz-ruby-text-editor',
			$_settings_plugin->dir_url . '/build/js/notwiz-ruby-text.min.js',
			[
				'wp-blocks',
				'wp-element',
				'wp-i18n',
			],
			$_settings_plugin->version,
			true
		);
		wp_enqueue_style(
			'notwiz-ruby-text-editor',
			$_settings_plugin->dir_url . '/build/css/notwiz-ruby-text.min.css',
			[
			],
			$_settings_plugin->version
		);
		wp_set_script_translations(
			'notwiz-ruby-text-editor',
			$_settings_plugin->text_domain,
			$_settings_plugin->dir_path . $_settings_plugin->domain_path
		);
	}

}
