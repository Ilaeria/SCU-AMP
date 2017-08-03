<?php
/*********************************************************************************************
 * Date: 	18/6/17
 * Author: 	Stephen M
 * Project: Shine ver 1.0
 * File: 	db_query.php 
 * 				Function for quering database
 * 				http://www.binpress.com/tutorial/using-php-with-mysql-the-right-way/17
 ********************************************************************************************/

function db_query($query) {
    // Connect to the database
    $connection = db_connect();

    // Query the database
    $result = mysqli_query($my_connection,$query);

    return $result;
}
?>