<?php

namespace App\Enums;

enum UserRole: string
{
    case Admin = 'admin';
    case Manajer = 'manajer';
    case Marketing = 'marketing';
}
