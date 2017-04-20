<?php

use Illuminate\Database\Seeder;

class TopicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Topic::create(['name'=>"Laravel",'bio'=>"laravel"]);
        \App\Topic::create(['name'=>"VueJs",'bio'=>"vueJs"]);
        \App\Topic::create(['name'=>"Composer",'bio'=>"composer"]);
        \App\Topic::create(['name'=>"Python",'bio'=>"python"]);
        \App\Topic::create(['name'=>"PHP",'bio'=>"php"]);
        \App\Topic::create(['name'=>"Github",'bio'=>"github"]);
        \App\Topic::create(['name'=>"Nginx",'bio'=>"nginx"]);
        \App\Topic::create(['name'=>"Centos",'bio'=>"centos"]);
        \App\Topic::create(['name'=>"ThinkPHP",'bio'=>"thinkphp"]);
        \App\Topic::create(['name'=>"MAC",'bio'=>"mac"]);
        \App\Topic::create(['name'=>"Centos",'bio'=>"centos"]);
        \App\Topic::create(['name'=>"Phpunit",'bio'=>"phpunit"]);
    }
}
