<?php

namespace Permissions\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['name', 'description'];

    public function users()
    {
        return $this->belongsToMany(config('auth.providers.users.model'), 'user_permission');
    }
}
