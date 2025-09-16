<?php

namespace App;

enum RoleEnum: string
{
    case ADMIN = 'admin';
    case REDAKSI = 'redaksi';
    case USER = 'user';
}
