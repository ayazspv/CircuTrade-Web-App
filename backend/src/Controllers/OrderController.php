<?php

namespace Controllers;

use Controllers\BaseController;
use Controllers\JWTController;
use Services\OrderService;

class OrderController extends BaseController {
    private $orderService;

    public function __construct() {
        $this->orderService = new OrderService();
        $this->jwtController = new JWTController();
    }

    public function getAllOrders() {
        $user = $this->getUserFromJwt();
        $orders = $this->orderService->getAllOrders();
        $this->respond($orders);
    }

    public function addOrder() {
        $user = $this->getUserFromJwt();
        $data = $this->getRequestData();
        $result = $this->orderService->addOrder((object)$data);
        if ($result) {
            $this->respond(['success' => true, 'order' => $result]);
        } else {
            $this->respondWithError(500, "Failed to add order");
        }
    }

    public function getLatestOrder() {
        $user = $this->getUserFromJwt();
        $order = $this->orderService->getLatestOrder();
        if ($order) {
            $this->respond($order);
        } else {
            $this->respondWithError(404, "No orders found");
        }
    }
}