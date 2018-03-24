<?php

namespace App\Policies;

use App\User;
use App\Thread;
use Illuminate\Auth\Access\HandlesAuthorization;

class ThreadPolicy
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

    public function update(User $user, Thread $thread)
    {
        // Na atualização, se o id do usuário logado é igual ao id do usuário da thread, então permiti atualizar
        return $user->id === $thread->user_id;
    }
}
