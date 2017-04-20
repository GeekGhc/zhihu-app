<?php

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
       Role::create(['name' => 'admin']);//拥有最高权限
       Role::create(['name' => 'member']);//系统用户
       Role::create(['name' => 'vip']);
       Role::create(['name' => 'super-vip']);
       Role::create(['name' => 'admin-one']);//管理问题的管理员
       Role::create(['name' => 'admin-two']);//管理评论的管理员
    }
}