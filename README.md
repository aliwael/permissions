# Permissions Package for Laravel

Manage user permissions and roles in Laravel.

## Features

- Manage permissions and assign them to users.
- Manage roles and assign them to users and permissions.
- Middleware to check for permissions or roles.
- Traits to add permissions and roles to the User model.
- Ready-to-use migrations for all required tables.

## Installation

1. Add the package to your project:

```bash
composer require aliwael/permissions
```

2. Publish migration and helper files automatically:

```bash
php artisan vendor:publish --tag=permissions-assets
```

3. Run the migrations:

```bash
php artisan migrate
```

4. Add Traits to your User model:

```php
use Permissions\Traits\HasPermissions;
use Permissions\Traits\HasRoles;

class User extends Authenticatable
{
    use HasPermissions, HasRoles;
    // ...
}
```

## Usage

### Assign Permission or Role

```php
$user->givePermission('edit-post');
$user->assignRole('admin');
```

### Check Permission or Role

```php
$user->hasPermission('edit-post');
$user->hasRole('admin');
$user->hasPermissionViaRole('edit-post');
```

### Middleware in Routes

```php
Route::get('/admin', function () {
    // ...
})->middleware('role:admin');

Route::post('/post', function () {
    // ...
})->middleware('permission:edit-post');
```

## Tables

- **permissions**: Permissions.
- **roles**: Roles.
- **user_permission**: User-permission pivot table.
- **role_user**: User-role pivot table.
- **permission_role**: Role-permission pivot table.

## Contributions

To contribute or report an issue, please open an Issue or Pull Request at:
[https://github.com/aliwael/permissions](https://github.com/aliwael/permissions)

---

This package was developed to make managing permissions and roles in Laravel projects easy.
