<?php

/**
 * @package Papirus_DB_Driver
 * @author Mesut Erdemir <erdemirmesut@gmail.com>
 * @copyright 2013 Papirus (http://egolabs.org)
 * @license Read LICENSE file under root folder
 * @link https://github.com/egolabs/papirus
 */
class Papirus_DB_Driver_PDO extends Papirus_DB_Driver_Abstract {
	
	/**
	 * PDO Connection Object
	 * @var		object
	 */
	private $_connection;
	
	/**
	 * Connect Database
	 * 
	 * @return	boolean
	 */
	public function connect() {
		try {
			// Create a new PDO connection
			$this -> _connection = new PDO(
				"{$this -> _settings['connection']['type']}:dbname={$this -> _settings['connection']['database']};host={$this -> _settings['connection']['hostname']}", // DSN
				$this -> _settings['connection']['username'], 
				$this -> _settings['connection']['password'], 
				array(
					PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC,
					PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES {$this -> _settings['charset']}"
				) // Options
			);
		}
		catch (PDOException $e) {
			throw new Papirus_DB_Exception($e -> getMessage());
		}
		return TRUE;
	}
	
	/**
	 * Fetch One Record
	 * 
	 * @param	string		$query
	 * @return	array
	 */
	public function fetchOne($query) {
		$pdoQuery = $this -> _connection -> query($query);
		if (!$pdoQuery) {
			throw new Papirus_DB_Exception("PDO Query Error");
		}
		
		$query_result = $pdoQuery -> fetch();
		if (!$query_result) {
			throw new Papirus_DB_Exception("Unable to Fetch Record");
		}
		
		return $query_result;
	}
	
	/**
	 * Fetch All Records
	 * 
	 * @param	string		$query
	 * @return	array
	 */
	public function fetchAll($query) {
		$pdoQuery = $this -> _connection -> query($query);
		if (!$pdoQuery) {
			throw new Papirus_DB_Exception("PDO Query Error");
		}
		
		$query_result = $pdoQuery -> fetchAll();
		if (!$query_result) {
			throw new Papirus_DB_Exception("Unable to Fetch Records");
		}
		
		return $query_result;
	}
	
	/**
	 * Execute Command
	 * 
	 * @param	string		$command
	 * @return	boolean
	 */
	public function execute($command) {
		$pdoResult = $this -> _connection -> exec($command);
		if ($pdoResult === FALSE) {
			throw new Papirus_DB_Exception("PDO Statement Error");
		}
		return (int)$pdoResult;
	}
	
	/**
	 * Close PDO Connection
	 * 
	 * @return	boolean
	 */
	public function disconnect() {
		$this -> _connection = null;
		return TRUE;
	}
	
}

// End of Papirus_DB_Driver_PDO.php
