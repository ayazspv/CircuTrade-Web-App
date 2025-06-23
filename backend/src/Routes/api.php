<?php
$allowedOrigins = [
    'http://localhost:5173'
];
$origin = $_SERVER['HTTP_ORIGIN'] ?? '';
if (in_array($origin, $allowedOrigins)) {
    header("Access-Control-Allow-Origin: $origin");
} else {
    header("Access-Control-Allow-Origin: http://localhost:5173");
}
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, PATCH, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Credentials: true");

// Handle preflight OPTIONS request globally
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once __DIR__ . '/../../vendor/autoload.php';

$router = new \Bramus\Router\Router();

// Set the namespace for controllers (adjust if your controllers namespace differs)
$router->setNamespace('Controllers');

// User routes
$router->post('/login', 'UserController@login');
$router->post('/register', 'UserController@register');
$router->get('/me', 'UserController@me');
$router->get('/users', 'UserController@getAllUsers');
$router->get('/users/latest', 'UserController@getLatestUser');
$router->post('/users/add', 'UserController@addUser');
$router->put('/users/edit/(\d+)', 'UserController@editUser');
$router->delete('/users/delete/(\d+)', 'UserController@deleteUser');

// Materials routes
$router->get('/materials', 'MaterialController@getAllMaterials');
$router->get('/materials/(\d+)', 'MaterialController@getMaterialById');
$router->post('/materials/add', 'MaterialController@addMaterial');
$router->put('/materials/edit/(\d+)', 'MaterialController@editMaterial');
$router->delete('/materials/delete/(\d+)', 'MaterialController@deleteMaterial');
$router->get('/materials/city/([^/]+)', 'MaterialController@getMaterialByCity');
$router->get('/materials/highest-stock', 'MaterialController@getHighestStockMaterial');
$router->get('/materials/quantities', 'MaterialController@getAllQuantities');

// Orders routes
$router->get('/orders', 'OrderController@getAllOrders');
$router->post('/orders/add', 'OrderController@addOrder');
$router->get('/orders/latest', 'OrderController@getLatestOrder');

// Order Items routes
$router->get('/orderitems', 'OrderItemController@getAllOrderItems');
$router->post('/orderitems/add', 'OrderItemController@addOrderItem');
$router->get('/orderitems/order/(\d+)', 'OrderItemController@getOrderItemsByOrderId');

// Test route
$router->get('/test', 'UserController@test');

$router->run();
