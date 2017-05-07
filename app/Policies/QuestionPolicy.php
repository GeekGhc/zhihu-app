<?php

namespace App\Policies;

use App\Question;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuestionPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //更新问题
    public function update(User $user,Question $question)
    {
        return $user->hasRole('admin-one') || $user->hasRole('admin');
    }

    //删除问题
    public function destroy(User $user,Question $question)
    {
        return $user->hasRole('admin-one') || $user->hasRole('admin');
    }

}
