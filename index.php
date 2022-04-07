<?php
require_once __DIR__ . '/vendor/autoload.php';

use OrderDispatchSystem\services\CourierService;

//In framework like laravel we will use dependency injection
$courierService = new CourierService();

try {
    $courierService->startBatch();
} catch (Exception $ex) {
    echo($ex->getMessage());
}

$courierService->addConsignment(1, [
    ["product_id" => 1],
    ["product_id" => 2],
    ["product_id" => 3]
]);

$courierService->addConsignment(2, [
    ["product_id" => 22],
    ["product_id" => 33],
]);

try {
    $courierService->endBatch();
} catch (Exception $ex) {
    echo($ex->getMessage());
}
