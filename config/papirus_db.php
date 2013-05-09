<?php
/**
 * Papirus Database Configuration File
 * 
 */

return array(
	'default' => array(
		'driver' => 'PDO', 
		'connection' => array(
			'type' => "mysql",
			'hostname' => 'localhost', 
			'database' => 'papirus_test', 
			'username' => 'root', 
			'password' => '123456'
		), 
		'table_prefix' => '', 
		'charset' => 'utf8'
	)
);
