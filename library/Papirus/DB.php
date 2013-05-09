<?php

/**
 * @package Papirus
 * @author Mesut Erdemir <erdemirmesut@gmail.com>
 * @copyright 2013 Papirus (http://egolabs.org)
 * @license Read LICENSE file under root folder
 * @link https://github.com/egolabs/papirus
 */
class Papirus_DB {
	
	/**
	 * Initialize Database Layer
	 * 
	 * @param	array 		$settings
	 * @return
	 */
	public function init(array $settings = NULL) {
		// @TODO: Database Profile Select System
		$settings = $settings['default'];
		$driver_class = "Papirus_DB_Driver_" . $settings['driver'];
		
		if (class_exists($driver_class)) {
			$driver_alias = strtolower($settings['driver']);
			
			$this -> $driver_alias = new $driver_class($settings);
		}
		else {
			throw new Papirus_DB_Exception("Unable to Find Database Driver");
		}
	}
	
}

// End of Papirus_DB.php
