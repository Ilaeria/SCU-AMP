<?php
	/*********************************************************************************************
	 * Date: 	18/6/17
	 * Author: 	Stephen M
	 * Project: Shine ver 1.0
	 * File: 	db_connect.php 
	 * 				Function for connecting to database
	 * 				http://www.binpress.com/tutorial/using-php-with-mysql-the-right-way/17
	 ********************************************************************************************/
	
	function db_connect(){
		if(!isset($_SESSION)) 
		{ 
			session_start(); 
		} 
		//define connection as a static variable, to avoid connecting more than once
		static $connection;
		
		//try connecting to the database, if a connection hasn't already been established
		if (!isset($connection)){
			$params = parse_ini_file('/home/smanni15/config.ini');
			$connection = mysqli_connect('localhost', $params['username'], $params['password'], $params['dbname']);
			//print("<font style=\"color: #FFFFFF\">Debug! - db_connect - Connection Success!!</font>");
		} //end if
			
		//If connection fails, handle error_get_last
		if ($connection===false) {
			//handle error
			return mysqli_connect_error();
			//print("<font style=\"color: #FFFFFF\">Debug! - db_connect - Connection failed!</font>");
		} //end if
		
		//print("<font style=\"color: #FFFFFF\">Debug! - db_connect - returning a connection!!</font>");
		return $connection;
		
	} // end db_connect		
?>