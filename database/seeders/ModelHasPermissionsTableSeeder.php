<?php

use App\Models\User;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModelHasPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('model_has_permissions')->truncate();

        $users = User::doesntHave('roles')->get();

        $random_user = $users->random();

        $random_user->givePermissionTo(Permission::ACCESS_ADMINISTRATOR_DASHBOARD);
        $random_user->givePermissionTo(Permission::VIEW_ROLES);
        
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
