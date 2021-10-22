<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require '../../config/Database.php';
require '../../models/Todo.php';

$instandb = new Database();
$db = $instandb->connect();

$instantodo = new Todo($db);

$instantodo->id = isset($_GET['id']) ? $_GET['id'] : die();

$instantodo->read_single();
$response = array();
$response['status_header_code'] = 'HTTP/1.1 200 Ok';
$response['body'] = array();

$row = array(
    'id' => $instantodo->id,
    'topic' => $instantodo->topic,
    'task' => $instantodo->task,
    'createdat' => $instantodo->createdat,
    'user_id' => $instantodo->user_id
);

array_push($response['body'], $row);

print_r(json_encode($response['body']));


?>