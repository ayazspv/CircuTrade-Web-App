<?php

namespace Controllers;

use Controllers\BaseController;
use Controllers\JWTController;
use Services\OrderItemService;

class OrderItemController extends BaseController {
    private $orderItemService;
    private $jwtController;

    public function __construct() {
        $this->orderItemService = new OrderItemService();
        $this->jwtController = new JWTController();
    }

    private function getUserFromJwt() {
        return $this->jwtController->checkForJwt();
    }

    public function getAllOrderItems() {
        $user = $this->getUserFromJwt();
        $orderItems = $this->orderItemService->getAllOrderItems();
        $this->respond($orderItems);
    }

    public function addOrderItem() {
        $user = $this->getUserFromJwt();
        $data = $this->getRequestData();
        $result = $this->orderItemService->addOrderItem((object)$data);
        if ($result) {
            $this->respond(['success' => true, 'orderItem' => $result]);
        } else {
            $this->respondWithError(500, "Failed to add order item");
        }
    }

    public function getOrderItemsByOrderId($orderId) {
        $user = $this->getUserFromJwt();
        $items = $this->orderItemService->getOrderItemsByOrderId($orderId);
        $this->respond($items);
    }
}