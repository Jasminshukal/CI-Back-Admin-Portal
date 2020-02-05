<?php
    //require_once FCPATH."Config.php";
    define('BASE_URL_CONFIG', 'http://localhost/jasmin/fresh_template_with_auto_rate_db');
    define('PASSWORD_NAME_SET', '');
    define('DATABASE_NAME_SET', 'jess_admin');
    define('HOSTNAME_SET', 'localhost');
    define('USER_NAME_SET', 'root');

    $conn = new mysqli(HOSTNAME_SET, USER_NAME_SET, PASSWORD_NAME_SET);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
	$sql = "CREATE DATABASE IF NOT EXISTS ".DATABASE_NAME_SET;
	if ($conn->query($sql) === TRUE) {
	    //echo "Database created successfully";
	}
?>