<?php

namespace Permissions\Helpers;

use Permissions\Models\Permission;

class PermissionHelper
{
    public static function assign($user, $permission)
    {
        $user->givePermission($permission);
    }

    public static function revoke($user, $permission)
    {
        $user->revokePermission($permission);
    }

    public static function has($user, $permission)
    {
        return $user->hasPermission($permission);
    }
}
