<?php

namespace App;

class Response {

    public function setResponseCode($status) {
        http_response_code($status);
    }
}