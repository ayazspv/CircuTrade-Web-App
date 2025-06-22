<?php

namespace Models;

enum UserStatus: string {
    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
}
