<?php

namespace App\Repositories;

use Exception;
use App\Models\User;
use App\Exports\UsersExport;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Maatwebsite\Excel\Facades\Excel;
use App\Repositories\Interfaces\UserInterface;


class UserRepository implements UserInterface
{

    public function allUsers()
    {
        return User::with('roles')->get();
    }

    public function allUsersWithPaginate($paginate)
    {
        return User::with('roles')->paginate($paginate);
    }

    public function storeUser($data)
    {
        DB::beginTransaction();

        try{
            $roles = Role::whereIn('id',$data->roles)->select('name')->get();
            $user = User::create([
                'name'  =>  $data->name,
                'email' =>  $data->email,
                'password' => bcrypt($data->password)
            ]);

            foreach($roles as $role){
                $user->assignRole($role->name);
            }

            DB::commit();

            return true;
        }catch (Exception $e){
            DB::rollback();
            return false;
        }

    }

    public function findUser($id)
    {

    }

    public function getUserDetails($id)
    {
        return User::with('roles')->where('id',$id)->first();
    }

    public function updateUser($data, $id)
    {
        DB::beginTransaction();

        try{
            $roles = Role::whereIn('id',$data->roles)->select('name')->get();

            $user = User::where('id', $id)->first();
            $user->update([
                'name'  =>  $data->name,
                'email' =>  $data->email,
                'password' => bcrypt($data->password)
            ]);

            $role_arr = [];
            foreach($roles as $role){
                array_push($role_arr, $role->name);
            }

            $user->syncRoles($role_arr);

            DB::commit();

            return true;
        }catch (Exception $e){
            DB::rollback();
            return false;
        }
    }

    public function destroyUser($id)
    {
        $user = User::where('id', $id)->first();
        if(isset($user)){
            $user->syncRoles([]);
            $status = $user->delete();
        }else{
            $status = false;
        }

        return $status;
    }
}
