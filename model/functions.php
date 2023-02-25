<?php

require('db_connect.php');
function perform_query_return($query, $return) {
	$connect = database_connect();
	$result = mysqli_query($connect, $query);
	if(!$result) {
		die(mysqli_error($connect));
	}

	$count = mysqli_num_rows($result);
	switch ($return) {
		case 'result':
			return $result;
			break;

		case 'count':
			return $count;
			break;
		
		default:
			return array($count, $result);
			break;
	}
	database_disconnect($connect);
}

function perform_query_perform($query) {
	$connect = database_connect();
	$result = mysqli_query($connect, $query);
	if(!$result) {
		die(mysqli_error($connect));
		//die('<script>alert("Query failed")</script>');
	}
	database_disconnect($connect);
	return true;
}

function escape_string($text) {
	$connect = database_connect();
	return mysqli_real_escape_string($connect, $text);
} 

function move_file($filename, $file_path_name,  $type) {
	$destination = '../../view/img/';
	switch($type) {
		case 'post':
			$destination .= 'posted_pics/';
			break;
	}
	$destination .= $filename;
	if(move_uploaded_file($file_path_name, $destination)){
		return true;
	}
	return false;
}

?>