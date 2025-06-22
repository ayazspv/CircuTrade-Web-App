<?php

namespace Services;

use Repositories\OrderRepository;

class OrderService {
    private $orderRepository;

    public function __construct() {
        $this->orderRepository = new OrderRepository();
    }

    public function getAllOrders() {
        return $this->orderRepository->getAllOrders();
    }

    public function addOrder($order) {
        return $this->orderRepository->addOrder($order);
    }

    public function getLatestOrder() {
        return $this->orderRepository->getLatestOrder();
    }
}