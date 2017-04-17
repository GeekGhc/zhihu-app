<?php


namespace App\Repositories\Admin;

use App\User;

class UserRepository
{
    public function byId($id)
    {
        return User::find($id);
    }

    public function getAllUsers()
    {
        return User::all();
    }

    public function delete($id)
    {

    }
}