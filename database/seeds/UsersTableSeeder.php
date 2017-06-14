<?php

use App\Model\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'id'=>1,
            'name'=>'Admin',
            'email'=>'admin@admin.admin',
            'password'=>bcrypt('password')
        ]);
    }
}
