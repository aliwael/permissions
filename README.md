# Permissions Package for Laravel

إدارة الصلاحيات والأدوار للمستخدمين في Laravel.

## المميزات

- إدارة الصلاحيات (Permissions) وربطها بالمستخدمين.
- إدارة الأدوار (Roles) وربطها بالمستخدمين والصلاحيات.
- ميدلواير للتحقق من الصلاحية أو الدور.
- Traits لإضافة الصلاحيات والأدوار لموديل المستخدم.
- ميجريشن جاهز للجداول المطلوبة.

## التثبيت

1. أضف الباكيج إلى مشروعك:

```bash
composer require aliwael/permissions
```

2. انقل ملفات الميجريشن وملف الهيلبر تلقائياً:

```bash
php artisan vendor:publish --tag=permissions-assets
```

3. نفذ الميجريشن:

```bash
php artisan migrate
```

4. أضف Traits إلى موديل المستخدم:

```php
use Permissions\Traits\HasPermissions;
use Permissions\Traits\HasRoles;

class User extends Authenticatable
{
    use HasPermissions, HasRoles;
    // ...
}
```

## الاستخدام

### إسناد صلاحية أو دور

```php
$user->givePermission('edit-post');
$user->assignRole('admin');
```

### التحقق من الصلاحية أو الدور

```php
$user->hasPermission('edit-post');
$user->hasRole('admin');
$user->hasPermissionViaRole('edit-post');
```

### ميدلواير في الراوتات

```php
Route::get('/admin', function () {
    // ...
})->middleware('role:admin');

Route::post('/post', function () {
    // ...
})->middleware('permission:edit-post');
```

## الجداول

- **permissions**: الصلاحيات.
- **roles**: الأدوار.
- **user_permission**: ربط المستخدم بالصلاحية.
- **role_user**: ربط المستخدم بالدور.
- **permission_role**: ربط الدور بالصلاحية.

## مساهمات

للمساهمة أو الإبلاغ عن مشكلة، يرجى فتح Issue أو Pull Request على:
[https://github.com/aliwael/permissions](https://github.com/aliwael/permissions)

---

تم تطوير الباكيج لسهولة إدارة الصلاحيات والأدوار في مشاريع Laravel.
