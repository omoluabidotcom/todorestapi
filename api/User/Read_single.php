<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require '../../config/Database.php';
require '../../models/User.php';

$instandb = new Database();
$db = $instandb->connect();

$instanuser = new User($db);

$instanuser->id = isset($_GET['id']) ? $_GET['id'] : die();

$instanuser->read_single();
$response = array();
$response['status_header_code'] = 'HTTP/1.1 200 Ok';
$response['body'] = array();

$row = array(
    'id' => $instanuser->id,
    'firstname' => $instanuser->firstname,
    'lastname' => $instanuser->lastname,
    'email' => $instanuser->email,
    'number' => $instanuser->number
);

array_push($response['body'], $row);

print_r(json_encode($response['body']));


?>