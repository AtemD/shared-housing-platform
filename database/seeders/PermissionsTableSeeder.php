<?php

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsTableSeeder extends Seeder
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
        DB::table('permissions')->truncate();

        // Access dashboard permissions
        Permission::create(['name' => Permission::ACCESS_ADMINISTRATOR_DASHBOARD]);
        
        
        Permission::create(['name' => Permission::CREATE_USERS]);
        Permission::create(['name' => Permission::UPDATE_USERS]);
        Permission::create(['name' => Permission::DELETE_USERS]);
        Permission::create(['name' => Permission::VIEW_USERS]);


        Permission::create(['name' => Permission::CREATE_REGIONS]);
        Permission::create(['name' => Permission::UPDATE_REGIONS]);
        Permission::create(['name' => Permission::DELETE_REGIONS]);
        Permission::create(['name' => Permission::VIEW_REGIONS]);

        Permission::create(['name' => Permission::CREATE_CITIES]);
        Permission::create(['name' => Permission::UPDATE_CITIES]);
        Permission::create(['name' => Permission::DELETE_CITIES]);
        Permission::create(['name' => Permission::VIEW_CITIES]);

        Permission::create(['name' => Permission::CREATE_PERMISSIONS]);
        Permission::create(['name' => Permission::UPDATE_PERMISSIONS]);
        Permission::create(['name' => Permission::DELETE_PERMISSIONS]);
        Permission::create(['name' => Permission::VIEW_PERMISSIONS]);

        Permission::create(['name' => Permission::CREATE_ROLES]);
        Permission::create(['name' => Permission::UPDATE_ROLES]);
        Permission::create(['name' => Permission::DELETE_ROLES]);
        Permission::create(['name' => Permission::VIEW_ROLES]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
