<?php

$type = null;
if(isset($_POST['approveBtn'])) {
    $type = 'approve';
}
else {
    $type = 'disapprove';
}
$post_id = $_POST['postId'];

$post_result = perform_query_return('select * from temp_post where post_id = ' . $post_id, 'all');
if($post_result[0] != 0) {
    $post = mysqli_fetch_array($post_result[1]);
    $filename = escape_string($post['filename']);
    $is_poem = escape_string($post['is_poem']);
    if($type == 'approve') {
        $poster_id = escape_string($post['poster_id']);
        $title = escape_string($post['title']);
        $post_time = escape_string($post['post_time']);
        $description = escape_string($post['description']);
        if(!$is_poem) {
            $place = escape_string($post['place']);
            $query = "insert into post (poster_id, title, description, place, filename, is_poem, post_time) 
            values($poster_id, '$title', '$description', '$place', '$filename', $is_poem, '$post_time')";
        }
        else {
            $query = "insert into post (poster_id, title, description, is_poem, post_time) 
            values($poster_id, '$title', '$description', $is_poem, '$post_time')";
        }
        perform_query_perform($query);
    }
    else {
        if(!$is_poem) {
            unlink('../../view/img/posted_pics/' . $filename);
        }
    }
    if(perform_query_perform('delete from temp_post where post_id = ' . $post_id)) {
        if($type == 'approve') {
            $approved = True;
        }
        else {
            $disapproved = True;
        }
    }
}

?>
