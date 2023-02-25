<?php

$search_query = escape_string($_GET['q']);

// get the matching users
$matched_users_result = perform_query_return("select * from users where username like '%search_query%' or eritrean_adress like '%search_query%' 
or profession like '%search_query%' or bio like '%search_query%' order by user_id desc", 'all');

// get the matching posts
$matched_posts_result = perform_query_return("select * from post where title like '%search_query%' or place like '%search_query%' or description
 like '%search_query%'", 'all');

// get the matching pending posts
$matched_pending_posts_result = perform_query_return("select * from temp_post where title like '%search_query%' or place like '%search_query%' or 
description like '%search_query%'", 'all');


 // get the result's count
$matched_users_num = $matched_users_result[0];
$matched_posts_num = $matched_posts_result[0];
$matched_pending_posts_num = $matched_pending_posts_result[0];


// get the result's info
$matched_users = array();
while($matched_user = mysqli_fetch_array($matched_users_result[1])) {

    $matched_users[] = $matched_user;
}

$matched_posts = array();
while($matched_post = mysqli_fetch_array($matched_posts_result[1])) {
    $matched_posts[] = $matched_post;
}

$matched_pending_posts = array();
while($matched_pending_post = mysqli_fetch_array($matched_pending_posts_result[1])) {
    $matched_pending_posts[] = $matched_pending_post;
}

?>
