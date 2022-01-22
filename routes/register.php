<?php

function route($method, $data, $url_data) {

    if ($method === 'POST') return register($method, $data, $url_data);

    header('HTTP/1.1 405 Method not allowed');
    return [
        'error' => [
            'code' => 405,
            'message' => 'Method not allowed'
        ]
    ];

}

function register($method, $data, $url_data) {

    require 'core/connect.php';

    $validator = new Validator();

    return [
        'data' => [
            'token' => '1234567'
        ]
    ];

}