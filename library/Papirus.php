<?php

/**
 * @package Papirus
 * @author Mesut Erdemir <erdemirmesut@gmail.com>
 * @copyright 2013 Papirus (http://egolabs.org)
 * @license Read LICENSE file under root folder
 * @link https://github.com/egolabs/papirus
 */
class Papirus {
	/**
	 * Papirus Version
	 * @const	string
	 */
	const VERSION = "0.0.1";
	
	/**
	 * Papirus Configuration Object
	 * @var		object
	 */
	public $config;
	
	/**
	 * Papirus Database Object
	 * @var		object
	 */
	public $db;
	
	/**
	 * Papirus Auto-Load Method
	 * 
	 * @param	string		$class_name
	 * @return	void
	 */
	public static function auto_load($class_name) {
		if (!class_exists($class_name)) {
			$class_path = sprintf("%s/%s.php", dirname(__FILE__), str_replace("_", DIRECTORY_SEPARATOR, $class_name));
			
			if (!file_exists($class_path)) {
				throw new Exception("Class Not Found ({$class_name})");
			}
			
			require_once $class_path;
		}
	}
	
	/**
	 * Initialize Papirus
	 * 
	 * @param	array 		$settings
	 * @return	null
	 */
	public function init(array $settings = NULL) {
		// Load Configuration Class
		if (!$this -> config instanceof Papirus_Config) {
			$this -> config = new Papirus_Config;
			
			if (isset($settings['CONFIG_PATH'])) { // Set Configuration Directory
				$this -> config -> attachDirectory($settings['CONFIG_PATH']);
			}
		}
		
		// Load DB Class
		if (!$this -> db instanceof Papirus_DB) {
			$this -> db = new Papirus_DB;
			
			if(($papirus_config_db = $this -> config -> get("papirus_db"))) {
				$this -> db -> init($papirus_config_db);
			}
		}
	}
}

// SPL Autoloader
spl_autoload_register(array('Papirus', 'auto_load'));

// End of Papirus.php
