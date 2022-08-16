<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Chat;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin
                ? Response::allow()
                : Response::deny("No tienes permiso de ver el panel administrador de usuarios");
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, User $model)
    {
        return $user->id == $model->id || $user->isAdmin || ( ($model->perfil != 'admin' || (Chat::where('user_one_id', $model->id)->where('user_two_id', $user->id)->first() )) || ( ($model->perfil == 'startup' && $user->model == 'startup') || (($model->perfil != 'startup' && $user->perfil == 'startup') || ($model->perfil == 'startup' && $user->perfil != 'startup')) ) )
                ? Response::allow()
                : Response::deny("No tienes permiso de ver ese perfil");
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, User $model)
    {
        return $user->id == $model->id 
                ? Response::allow()
                : Response::deny("No tienes permiso de editar el perfil");
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, User $model)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, User $model)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, User $model)
    {
        //
    }

    public function admin(User $user)
    {
        return $user->isAdmin
                ? Response::allow()
                : Response::deny("Solo un administrador puede modificar estos datos");
    }
}
