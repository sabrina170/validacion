<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'admin']);
        $estu = Role::create(['name' => 'estudiante']);
        $trab = Role::create(['name' => 'trabajador']);

        //estudiante, admin son vistas
        Permission::create(['name' => 'estudiante'])->assignRole($estu);
        Permission::create(['name' => 'admin'])->syncRoles([$admin, $trab]);
    }
}
