<?php

namespace App\Repositories;

use Spatie\Permission\Models\Permission;
use App\Repositories\Interfaces\PermissionInterface;


class PermissionRepository implements PermissionInterface
{

    public function allPermissions()
    {
        return Permission::pluck('id', 'name');
    }

}
