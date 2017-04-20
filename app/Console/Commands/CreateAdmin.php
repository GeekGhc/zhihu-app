<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Validator;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create the admin';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = $this->ask('input the name :');
        $email = $this->ask('input the email');
        $password = $this->secret('please input the password');
        $data = [
            'name'     => $name,
            'email'    => $email,
            'password' => $password,
        ];
        if ( $this->userRegister($data) ) {
            $this->info('admin has been created successfully !');
        } else {
            $this->error('sorry! the data is wrong !');
        }
    }

    //管理员注册
    public function userRegister($data)
    {
        $validator = Validator::make($data, [
            'name' => 'required|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
        ]);
        if (!$validator->passes()) {
            return false;
        }
        return $this->createAdmin($data);
    }

    //管理员信息创建
    public function createAdmin($data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'avatar' => '/images/avatars/elliot.jpg',
            'confirmation_token' => str_random(40),
            'password' => bcrypt($data['password']),
            'api_token'=>str_random(60),
            'is_active'=>1,
            'setting'=> ['city'=>'','site'=>'','github'=>'','bio'=>'']
        ]);
        $user->assignRole('admin');
        return $user;
    }


}
