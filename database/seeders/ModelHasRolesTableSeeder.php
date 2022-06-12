<?php

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;
use App\Models\UserAccountStatus;
use Illuminate\Support\Facades\DB;

class ModelHasRolesTableSeeder extends Seeder
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
        DB::table('model_has_roles')->truncate();

        // Give one user super admin role.
        $user = User::where('first_name', 'Admin')->firstOrFail();
        $user->assignRole(Role::SUPER_ADMINISTRATOR);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
