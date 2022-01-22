<?php

header('Content-Type: application/json');
header('HTTP/1.1 200 OK');

$method = $_SERVER['REQUEST_METHOD'];

$data = get_data($method);

function get_data($method) {

    if ($method === 'POST') return $_POST;
    if ($method === 'GET') return $_GET;

    $data = [];
    $exploded = explode('&', json_decode(file_get_contents('php://input')));

    foreach ($exploded as $pair) {

        $item = explode('=', $pair);

        if (count($item) === 2) {
            $data[urldecode($item[0])] = urldecode($item[1]);
        }

    }

    return $data;

}

$urls  = isset($_GET['q']) ? explode('/', rtrim($_GET['q'], '/')) : [];

if ($urls[0] === 'api') {
    $route = $urls[1];
    $url_data = array_splice($urls, 2);

    require "core/Validator.php";
    require "routes/$route.php";

    $response = route($method, $data, $url_data);
    if ($response) echo json_encode($response);
}

