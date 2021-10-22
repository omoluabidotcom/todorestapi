<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

require '../../config/Database.php';
require '../../models/Task.php';

$instandb = new Database();
$db = $instandb->connect();

$rest = new Resthandler();

$instantodo = new Task($db);

$row = json_decode(file_get_contents("php://input"));

$instantodo->task = $row->task;
$instantodo->todo_id = $row->todo_id;

if ($instantodo->create()) {

    $response = array();
    $response['status_header_code'] = 'HTTP/1.1 Ok 200';
    $response['body'] = array(
        'message' => 'New Task Created'
    );

    print_r(json_encode($response['body']));

    
} else {

    echo $rest->unprocessable();
}


?>