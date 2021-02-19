<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user =  new User();
        $user->name = 'superadmin';
        $user->email = 'admin@admin.com';
        $user->password = bcrypt('1234567');
        $user->role =1;
        $user->isVerified = 1;
        $user->specific_address= 'kathmandu';
        $user->phone_no = '9867032092';
        $user->save();

    }
}
