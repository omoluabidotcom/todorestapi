<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-header: Access-Control-Allow-Methods, Content-Type, Authorization, X-Requested-With');

// database connection class 
require '../../config/Database.php';

// User class 
require '../../models/User.php';


$instandb = new Database();
$db = $instandb->connect();

$rest = new Resthandler();

$instanuser = new User($db);

$row = json_decode(file_get_contents("php://input"));

$instanuser->id = $row->id;

if($instanuser->delete()) {

    $response = array();
    $response['status_header_code'] = 'HTTP/1.1 200 Ok';
    $response['body'] = array(
        "Message" => "User Deleted"
    );

    print_r(json_encode($response['body']));

} else {

    $rest->unprocessable();
}

?>