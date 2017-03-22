<?php

use Refactor\Application\Controller\ApplicationController;

require_once __DIR__ . '/../vendor/autoload.php';

header('Access-Control-Allow-Origin: *');
header('Content-Type: json');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header('HTTP/1.1 200 Created');
    header("Access-Control-Allow-Methods: 'POST'");
    header("Access-Control-Allow-Credentials: true");
    header("Access-Control-Allow-Headers: X-Requested-With, X-HTTP-Method-Override, Content-Type, Accept");
    return;
}


set_exception_handler(function (\Exception $e) {
    http_response_code(200);
    print json_encode(['error' => $e->getMessage()]);
    return;
});

$applicationController = new ApplicationController();
