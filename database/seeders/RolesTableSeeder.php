<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'id'    =>  1,
                'name'  =>  'admin',
                'guard_name' => 'web'
            ],
            [
                'id'    =>  2,
                'name'  =>  'user',
                'guard_name' => 'web'
            ],
        ];

        Role::insert($roles);
    }
}
