<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    // Roles Permissions
    const CREATE_ROLES = 'create roles';
    const UPDATE_ROLES = 'update roles';
    const DELETE_ROLES = 'delete roles';
    const VIEW_ROLES = 'view roles';

    // Permissions Permissions
    const CREATE_PERMISSIONS = 'create permissions';
    const UPDATE_PERMISSIONS = 'update permissions';
    const DELETE_PERMISSIONS = 'delete permissions';
    const VIEW_PERMISSIONS = 'view permissions';

    // Access Routes, used to redirect users appropriately
    const ACCESS_ADMINISTRATOR_DASHBOARD = 'access administrator dashboard';

    // Permissions Permissions
    const CREATE_OPENING_HOURS = 'create opening hours';
    const UPDATE_OPENING_HOURS = 'update opening hours';
    const DELETE_OPENING_HOURS = 'delete opening hours';
    const VIEW_OPENING_HOURS = 'view opening hours';

    // Cuisines permissions
    const CREATE_CUISINES = 'create cuisines';
    const UPDATE_CUISINES = 'update cuisines';
    const DELETE_CUISINES = 'delete cuisines';
    const VIEW_CUISINES = 'view cuisines';

    // Users permissions
    const CREATE_USERS = 'create users';
    const UPDATE_USERS = 'update users';
    const DELETE_USERS = 'delete users';
    const VIEW_USERS = 'view users';

    // Cities
    const CREATE_CITIES = 'create cities';
    const UPDATE_CITIES = 'update cities';
    const DELETE_CITIES = 'delete cities';
    const VIEW_CITIES = 'view cities';

    // Regions
    const CREATE_REGIONS = 'create regions';
    const UPDATE_REGIONS = 'update regions';
    const DELETE_REGIONS = 'delete regions';
    const VIEW_REGIONS = 'view regions';

}
