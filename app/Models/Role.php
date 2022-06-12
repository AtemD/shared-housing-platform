<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    // Roles
    const SUPER_ADMINISTRATOR = 'super administrator';
    const ADMINISTRATOR= 'administrator';
}
