<?php

$tried_to_post = true;
$post_time = date('H:i jS F');
if(isset($_POST['postPic'])){       // if the user posted a photo
    $filename_not_selected_error = false;
    $filename_not_supported_error = false;
    $title_error = false;
    $place_error = false;
    $description_error = false;

    $filename = escape_string($_FILES['picFilename']['name']);
    $title = escape_string($_POST['picTitle']);
    $place = escape_string($_POST['picPlace']);
    $description = escape_string($_POST['picDescription']);

    // Check the filename
    if($filename == '') {
        $filename_not_selected_error = true;
    }
    else {
        $file_type = strtolower(substr($filename, (strlen($filename) - 3)));
        $file_types = array('jpg', 'png', 'peg', 'gif');
        if(!in_array($file_type, $file_types)) {
            $filename_not_supported_error = true;
        }
    }

    // Check the title
    if(strlen($title) < 3 || strlen($title) > 100) {
        $title_error = true;
    }


    // check the place
    if(strlen($place) < 3 || strlen($place) > 100) {
        $place_error = true;
    }

    // check the description
    if(strlen($description) < 20 || strlen($description) > 1000) {
        $description_error = true;
    }


    // if there is no error in the form, proceed to uploading the photo to the database
    if (!$filename_not_selected_error && !$filename_not_supported_error && !$title_error && !$place_error && !$description_error) {
        $filename = rand() . $filename;
        $file_path_name = $_FILES['picFilename']['tmp_name'];
        if(move_file($filename, $file_path_name, 'post')) {
            $description_array = explode('\n', $description);
            $description = implode('<br/>', $description_array);
            perform_query_perform("insert into temp_post(poster_id, title, description, place, filename, is_poem, post_time) 
            values(1, '$title', '$description', '$place', '$filename', 0, '$post_time')");
        }
        else {
            die('Unable to move the posted photo to server. Please try again!!!');
        }
    } 
}


else {      // if the user posted a poem
    $title_error = false;
    $text_error = false;

    $title = escape_string($_POST['poemTitle']);
    $text = escape_string($_POST['poemText']);

    // check the title
    if(strlen($title) < 3 || strlen($title > 100)) {
        $title_error = true;
    }

    // check the text
    if(strlen($text) < 20 || strlen($text) > 1000) {
        $text_error = true;
    }

    if(!$title_error && !$text_error) {     // if there is no error in the form, we can proceed to adding it to the database
        $text_array = explode('\n', $text);
        $text = implode('<br/>', $text_array);
        perform_query_perform("insert into temp_post(poster_id, title, description, is_poem, post_time) 
            values(1, '$title', '$text', 1, '$post_time')");
    }
}

?>