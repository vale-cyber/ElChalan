<?php

use Config\database;
use Model\post;

//Headers
header('Access-Control-Allow-Origin: *');
header('Contnet-Type: applicaiton/json');

$database = new database();
$db = $database->connect();

//ini post
$post = new post($db);

//query
$result = $post->read();

//row count
$rowCount = $result->rowCount();

if($rowCount > 0) {
    //Post array
    $postArray = array();
    $postArray['data'] = array();
    
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        
        $postItem = [
            'id' => $id,
            'title' => $title,
            'body' => html_entity_decode($body),
            'blah' => $blah,
            'etc' => $etc
        ];

        //Push to data
        array_push($postArray['data'], $postItem);
    }

    //To Json
    echo json_encode($postArray);
} else {
    echo json_encode([
        'message' => 'no data'
    ]);
}
