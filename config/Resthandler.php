<?php

class Resthandler{

    public function notfound() {

        $response['status_header_code'] = 'HTTP/1.1 404 Not Found';
        $response['body'] = null;
    }

    public function unprocessable() {

        $response['status_header_code'] = 'HTTP/1.1 Unprocessable Entity';
        $response['body'] = json_encode(array(
            "error" => "Invalid Input"
        ));
    }
}

?>