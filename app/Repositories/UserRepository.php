<?php
namespace App\Repositories;


use App\User;

class UserRepository
{
  public function byId($id)
  {
    return User::find($id);
  }
}