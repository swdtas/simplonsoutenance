<?php
namespace App\Helpers;

use App\Models\User;

class UserHelper
{
    /**
     * Supprime un utilisateur de la base de données.
     *
     * @param int $id
     * @return void
     */
    public static function deleteUser($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
        }
    }
}
