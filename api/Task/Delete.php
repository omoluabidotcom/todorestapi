<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

require '../../config/Database.php';
require '../../models/Task.php';

$instandb = new Database();
$db = $instandb->connect();

$rest = new Resthandler();

$instantodo = new Task($db);

$row = json_decode(file_get_contents("php://input"));

$instantodo->id = $row->id;

if ($instantodo->delete()) {

    $response = array();
    $response['status_header_code'] = 'HTTP/1.1 Ok 200';
    $response['body'] = array(
        'message' => 'Todo Deleted'
    );

    print_r(json_encode($response['body']));

    
} else {

    echo $rest->unprocessable();
}


?>