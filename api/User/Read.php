<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

require '../../config/Database.php';
require '../../models/User.php';

$instandb = new Database();
$db = $instandb->connect();

$rest = new resthandler();

$instanuser = new User($db);
$result = $instanuser->read();
$num = $result->rowCount();

if ($num > 0) {

    $response = array();
    $response['status_header_code'] = 'HTTP/1.1 200 Ok';
    $response['body'] = array();

    while($data = $result->fetch()) {

        extract($data);

        $user = array(
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'number' => $number
        );
        
        array_push($response['body'], $user);
    }

    print_r(json_encode($response['body']));
} else {

    return $rest->unprocessable();
}

?>