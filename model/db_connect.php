<?php

function database_connect() {
	$server_name = 'localhost';
	$user = 'root';
	$password = '';
	$database_name = 'eriparallax';

	$connect = mysqli_connect($server_name, $user, $password, $database_name);
	if(!$connect) {
		die('<script>alert("mysql connection failed")</script>');
		
	}

	return $connect;
}

function database_disconnect($connection){
    mysqli_close($connection);
}

?>