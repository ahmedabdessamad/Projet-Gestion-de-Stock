<?php

if (!function_exists('checkAdministratorRole')) {
    /**
     * @param \App\Modules\User\Models\User $user
     * @return bool
     */
    function checkAdministratorRole($user)
    {   
        foreach ($user->roles as $role) {
            if ($role->id === 1) {
                return true;
            }
        }
        return false;
    }
}
if (!function_exists('checkResponsibleRole')) {
    /**
     * @param \App\Modules\User\Models\User $user
     * @return bool
     */
    function checkResponsibleRole($user)
    {
        foreach ($user->roles as $role) {
            if ($role->id === 2) {
                return true;
            }
        }
        return false;
    }
}

if (!function_exists('checkEmployeeRole')) {
    /**
     * @param \App\Modules\User\Models\User $user
     * @return bool
     */
    function checkEmployeeRole($user)
    {
        foreach ($user->roles as $role) {
            if ($role->id === 3) {
                return true;
            }
        }
        return false;
    }
}
