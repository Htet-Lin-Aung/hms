<?php
namespace App\Repositories\Interfaces;

Interface RoleInterface{

    public function allRoles();
    public function allRolesWithPaginate($paginate);
    public function storeRole($data);
    public function findRole($id);
    public function getRoleDetails($id);
    public function updateRole($data, $id);
    public function destroyRole($id);
}
