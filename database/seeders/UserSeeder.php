<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['id' => 1, 'name' => 'Admin', 'email' => 'tranviethiepdz@gmail.com', 'username' => 'tranviethiepdz@gmail.com', 'password' => '123456', 'phone' => '0969549903', 'dob' => '1994-09-06', 'position' => '', 'status' => 1, 'parent_id' => 0],
            ['id' => 2, 'name' => 'SubAdmin', 'email' => 'tranhiep2@gmail.com', 'username' => 'tranhiep2', 'password' => '123456', 'phone' => '0969549903', 'dob' => '1994-09-06', 'position' => '', 'status' => 1, 'parent_id' => 0],
            ['id' => 3, 'name' => 'Content', 'email' => 'tranhiep3@gmail.com', 'username' => 'tranhiep3', 'password' => '123456', 'phone' => '0969549903', 'dob' => '1994-09-06', 'position' => '', 'status' => 1, 'parent_id' => 0],
            ['id' => 4, 'name' => 'Product', 'email' => 'tranhiep4@gmail.com', 'username' => 'tranhiep4', 'password' => '123456', 'phone' => '0969549903', 'dob' => '1994-09-06', 'position' => '', 'status' => 1, 'parent_id' => 0],
            ['id' => 5, 'name' => 'View', 'email' => 'tranhiep5@gmail.com', 'username' => 'tranhiep5', 'password' => '123456', 'phone' => '0969549903', 'dob' => '1994-09-06', 'position' => '', 'status' => 1, 'parent_id' => 0],
        ];
        foreach ($users as $user) {
            DB::table('users')->insert([
                'id'        => $user['id'],
                'name'      => $user['name'],
                'email'     => $user['email'],
                'username'  => $user['username'],
                'password'  => Hash::make($user['password']),
                'phone'     => $user['phone'],
                'dob'       => $user['dob'],
                'position'  => $user['position'],
                'status'    => $user['status'],
                'parent_id' => $user['parent_id'],
            ]);
        }
    }
}
