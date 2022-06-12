<?php

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleHasPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('role_has_permissions')->truncate();

        $super_admin_role = Role::where('name', Role::SUPER_ADMINISTRATOR)->first();
        $admin_role = Role::where('name', Role::ADMINISTRATOR)->first();
        $all_permissions = Permission::all();

        // Give the super administrator all permissions
        $super_admin_role->syncPermissions($all_permissions);

        // Give the admin all or some of the permissions
        $admin_role->syncPermissions($all_permissions);
        // But revoke some permissions for this admin user

        // Give the retailer role some permissions
        $retailer_role->syncPermissions([
            Permission::ACCESS_RETAILER_DASHBOARD,


        //    Permission::CREATE_REGIONS,
        //    Permission::UPDATE_REGIONS,
        //    Permission::DELETE_REGIONS,
           Permission::VIEW_REGIONS,

        //    Permission::CREATE_CITIES,
        //    Permission::UPDATE_CITIES,
        //    Permission::DELETE_CITIES,
           Permission::VIEW_CITIES,

        //    Permission::CREATE_PERMISSIONS,
           Permission::UPDATE_PERMISSIONS,
        //    Permission::DELETE_PERMISSIONS,
           Permission::VIEW_PERMISSIONS,

        //    Permission::CREATE_ROLES,
        //    Permission::UPDATE_ROLES,
        //    Permission::DELETE_ROLES,
           Permission::VIEW_ROLES,
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
