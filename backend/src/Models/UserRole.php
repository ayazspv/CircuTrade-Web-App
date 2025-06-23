<?php

namespace Models;

enum UserRole: string {
    case ADMIN = 'admin';
    case USER = 'user';
}
