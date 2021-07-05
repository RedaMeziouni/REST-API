<?php
// Headers
header('Access-Control-Allow-Origin: *'); //Accessible by Everybody
header('Content-Type: application/json'); //Accept JSON

// Including the DB
include_once('../../config/Database.php');
include_once('../../models/host.php');

// Instantiate DB and Connect to it
$databse = new Database();
$db = $database->connect();

// Instantiate Blog Post OBJECT
$post = new Post($db);

// Blog Post QUERY
$result = $post->read();

// Get Row Count
$num = $result->rowCount();

// Checking the posts
if($num > 0) {
    // Post an array
    $posts_arr = array();
    $posts_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $post_item = array(
            'id' => $id,
            'title' => $title,
            'body' => html_entity_decode($body),
            'author' => $author,
            'category_id' => $category_id,
            'category_name' => $category_name
        );

        // Push the itemes to the data array
        array_push($posts_arr['data'], $post_item);
    }

    // Turn the code into a JSON format and Output it
    echo json_encode($posts_arr); 
} else {
    // in the case that there is no Posts
    echo json_encode(
        array('message' => 'No Posts Found')
    );
}