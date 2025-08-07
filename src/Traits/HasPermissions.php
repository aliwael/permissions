<?php

namespace Permissions\Traits;

use Permissions\Models\Permission;

trait HasPermissions
{
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'user_permission');
    }

    public function hasPermission($permission)
    {
        return $this->permissions()->where('name', $permission)->exists();
    }

    public function givePermission($permission)
    {
        $perm = Permission::where('name', $permission)->first();
        if ($perm) {
            $this->permissions()->attach($perm);
        }
    }

    public function revokePermission($permission)
    {
        $perm = Permission::where('name', $permission)->first();
        if ($perm) {
            $this->permissions()->detach($perm);
        }
    }
}
