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

    public function getOrdersByUserId($userId) {
        $user = $this->getUserFromJwt();
        // Optionally, only allow users to fetch their own orders or admins
        if ($user->data->id != $userId && $user->data->role !== 'admin') {
            $this->respondWithError(403, "Forbidden");
            return;
        }
        $orders = $this->orderService->getOrdersByUserId($userId);
        $this->respond($orders);
    }
}