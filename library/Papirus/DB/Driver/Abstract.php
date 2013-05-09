<?php

/**
 * @package Papirus_DB_Driver
 * @author Mesut Erdemir <erdemirmesut@gmail.com>
 * @copyright 2013 Papirus (http://egolabs.org)
 * @license Read LICENSE file under root folder
 * @link https://github.com/egolabs/papirus
 */
abstract class Papirus_DB_Driver_Abstract implements Papirus_DB_Interface {
	/**
	 * Database Settings
	 * 
	 * @var		array
	 */
	protected $_settings;
	
	/**
	 * Constructor Method
	 * 
	 * @param	array		$settings
	 * @return	null
	 */
	function __construct(array $settings = NULL) {
		$this -> _settings = $settings;
	}
}

// End of Papirus_DB_Driver_Abstract.php
