<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('name', 'user')->first();
        $role_manager  = Role::where('name', 'manager')->first();

        $user = new User();
        $user->name = 'User Name';
        $user->email = 'user@example.com';
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach($role_user);

        $manager = new User();
        $manager->name = 'Manager User';
        $manager->email = 'manager@example.com';
        $manager->password = bcrypt('secret');
        $manager->save();
        $manager->roles()->attach($role_manager);
    }
}
