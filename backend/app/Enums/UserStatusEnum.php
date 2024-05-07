<?php

namespace App\Enums;

enum UserStatusEnum: string
{
    case Pending = 'pending';
    case Active = 'active';
    case Deleted = 'deleted';
}
