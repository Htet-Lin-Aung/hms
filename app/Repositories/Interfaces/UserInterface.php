<?php
namespace App\Repositories\Interfaces;

Interface UserInterface{

    public function allUsers();
    public function allUsersWithPaginate($paginate);
    public function storeUser($data);
    public function findUser($id);
    public function getUserDetails($id);
    public function updateUser($data, $id);
    public function destroyUser($id);
}
