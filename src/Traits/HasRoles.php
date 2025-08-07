<?php

namespace Permissions\Traits;

use Permissions\Models\Role;

trait HasRoles
{
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }

    public function hasRole($role)
    {
        return $this->roles()->where('name', $role)->exists();
    }

    public function assignRole($role)
    {
        $roleObj = Role::where('name', $role)->first();
        if ($roleObj) {
            $this->roles()->attach($roleObj);
        }
    }

    public function removeRole($role)
    {
        $roleObj = Role::where('name', $role)->first();
        if ($roleObj) {
            $this->roles()->detach($roleObj);
        }
    }

    public function hasPermissionViaRole($permission)
    {
        return $this->roles()->whereHas('permissions', function ($q) use ($permission) {
            $q->where('name', $permission);
        })->exists();
    }
}
