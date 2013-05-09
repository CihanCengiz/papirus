<?php

/**
 * @package Papirus_DB
 * @author Mesut Erdemir <erdemirmesut@gmail.com>
 * @copyright 2013 Papirus (http://egolabs.org)
 * @license Read LICENSE file under root folder
 * @link https://github.com/egolabs/papirus
 */
interface Papirus_DB_Interface {
	
	/**
	 * Open Database Connection
	 * 
	 * @return	boolean
	 */
	public function connect();
	
	/**
	 * Fetch One Record
	 * 
	 * @param	string		$query
	 * @return	array
	 */
	public function fetchOne($query);
	
	/**
	 * Fetch All Records
	 * 
	 * @param	string		$query
	 * @return	array
	 */
	public function fetchAll($query);
	
	/**
	 * Execute Command
	 * 
	 * @param	string		$command
	 * @return	boolean
	 */
	public function execute($command);
	
	/**
	 * Close Database Connection
	 * 
	 * @return	boolean
	 */
	public function disconnect();
	
}

// End of Papirus_DB_Interface.php
