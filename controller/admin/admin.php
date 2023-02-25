<?php

require('../../model/functions.php');

// global variables
$approved = false;
$disapproved = false;

$user_deleted = false;

$tried_to_post = false;


// Post a photo or a poem
if(isset($_POST['postPic']) || isset($_POST['postPoem'])) {
	require('../../controller/post.php');
}

// Approve or disapprove a post
if(isset($_POST['approveBtn']) || isset($_POST['disapproveBtn'])) {
	require('../../controller/admin/approve_disapprove_post.php');
}

// Delete a user
if(isset($_POST['delete_btn'])) {
    $user_id = escape_string($_POST['user_id']);
    perform_query_perform('delete from users where user_id=' . $user_id);
    $user_deleted = true;
}


// get information from the database for viewing
$users_result = perform_query_return('select * from users', 'all');
$posts_result = perform_query_return('select * from post', 'all');
$pending_posts_result = perform_query_return('select * from temp_post', 'all');
$suggestions_result = perform_query_return('select * from feedback', 'all');

$users_num = $users_result[0];
$posts_num = $posts_result[0];
$pending_posts_num = $pending_posts_result[0];
$suggestions_num = $suggestions_result[0];

$users = array();
while($user = mysqli_fetch_array($users_result[1])) {
	$users[] = $user;
}

$posts = array();
while($post = mysqli_fetch_array($posts_result[1])) {
	$posts[] = $post;
}

$pending_posts = array();
$posters_id = array();
while($pending_post = mysqli_fetch_array($pending_posts_result[1])) {
	$pending_posts[] = $pending_post;
	$posters_id[] = $pending_post['poster_id'];
}

$suggestions = array();
$suggesters_id = array();
while($suggestion = mysqli_fetch_array($suggestions_result[1])) {
	$suggestions[] = $suggestion;
	$suggesters_id[] = $suggestion['feedbacker_id'];
}


// get suggesters info
$suggesters_results = array();
for($i = 0; $i < count($suggesters_id); $i++) {
	$suggesters_results[] = perform_query_return('select * from users where user_id = ' . $suggesters_id[$i], 'result');
}

$suggesters = array();
for($i = 0; $i < count($suggesters_results); $i++) {
	$suggesters[] = mysqli_fetch_array($suggesters_results[$i]);
}


// get posters info
$posters_results = array();
for($i = 0; $i < count($posters_id); $i++) {
	
	$posters_results[] = perform_query_return('select * from users where user_id = ' . $posters_id[$i], 'result');
}

$posters = array();
for($i = 0; $i < count($posters_results); $i++) {
	$posters[] = mysqli_fetch_array($posters_results[$i]);
}

?>