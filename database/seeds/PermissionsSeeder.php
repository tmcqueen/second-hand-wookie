<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_users = Permission::create(['name' => 'admin.users']);
        $admin_assets = Permission::create(['name' => 'admin.assets']);

        $admin_role = Role::create(['name' => 'admin']);
        $admin_role->givePermissionTo($admin_users);
        $admin_role->givePermissionTo($admin_assets);
    }
}
