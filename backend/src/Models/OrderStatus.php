<?php

namespace Models;

enum OrderStatus: string {
    case PENDING = 'pending';
    case COMPLETED = 'completed';
    case SHIPPED = 'shipped';
}
