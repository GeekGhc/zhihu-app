<?php

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
       Role::create(['name' => 'admin']);
       Role::create(['name' => 'member']);
       Role::create(['name' => 'vip']);
       Role::create(['name' => 'super-vip']);

    }
}