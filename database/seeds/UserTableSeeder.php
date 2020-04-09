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
        $role_admin  = Role::where('name', 'admin')->first();

        $user = new User();
        $user->name = 'User 1';
        $user->email = 'user@user.com';
        $user->password = bcrypt('123456');
        $user->email_verified_at = '2020-02-11 14:43:22';
        $user->profile_pic = 'default.png';
        $user->save();
        $user->roles()->attach($role_user);

        $user2 = new User();
        $user2->name = 'Bagas Alwi';
        $user2->email = 'bagasalwisetyo2@gmail.com';
        $user2->password = bcrypt('bagasalwi');
        $user2->email_verified_at = '2020-02-11 14:43:22';
        $user2->nik = '1241241241242';
        $user2->telepon = '08594660295';
        $user2->gender = 'male';
        $user2->dob = '1998-03-21';
        $user2->national = 'Indonesia';
        $user2->profile_pic = '1582820147.jpg';
        $user2->attachment = 'Bagas Alwi_nik.jpg';
        $user2->save();
        $user2->roles()->attach($role_user);

        $admin = new User();
        $admin->name = 'Super Admin';
        $admin->email = 'admin@admin.com';
        $admin->password = bcrypt('123456');
        $admin->email_verified_at = '2020-02-11 14:43:22';
        $admin->profile_pic = 'default.png';
        $admin->save();
        $admin->roles()->attach($role_admin);
    }
}
