<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

require '../../config/Database.php';
require '../../models/Task.php';

$instandb = new Database();
$db = $instandb->connect();

$rest = new resthandler();

$instantodo = new Task($db);
$result = $instantodo->read();
$num = $result->rowCount();

if ($num > 0) {

    $response = array();
    $response['status_header_code'] = 'HTTP/1.1 200 Ok';
    $response['body'] = array();

    while($data = $result->fetch()) {

        extract($data);

        $todo = array(
            'id' => $id,
            'task' => $task,
            'todo_id' => $todo_id
        );
        
        array_push($response['body'], $todo);
    }

    print_r(json_encode($response['body']));
} else {

    return $rest->unprocessable();
}

?>