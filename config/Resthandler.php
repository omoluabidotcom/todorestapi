<?php

class Resthandler{

    public function notfound() {

        $response['status_header_code'] = 'HTTP/1.1 404 Not Found';
        $response['body'] = null;

        print_r($response['body']);
    }

    public function unprocessable() {

        $response['status_header_code'] = 'HTTP/1.1 422 Unprocessable Entity';
        $response['body'] = json_encode(array(
            "error" => "Invalid Input"
        ));

        print_r($response['body']);
    }

}

?>