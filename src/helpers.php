<?php
// permissions/src/helpers.php

if (!function_exists('user_has_permission')) {
    function user_has_permission($permission)
    {
        $user = auth()->user();
        return $user && $user->hasPermission($permission);
    }
}
