<?php

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
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

        DB::table('roles')->truncate();

        $super_admin_role = Role::create(['name' => Role::SUPER_ADMINISTRATOR]);
        $admin_role = Role::create(['name' => Role::ADMINISTRATOR]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
