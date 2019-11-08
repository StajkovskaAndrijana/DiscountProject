<?php

use App\User;
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
        $user = new User();
        $user->name = 'Andrijana Stajkovska';
        $user->email = "admin.admin@gmail.com";
        $user->is_admin = 1;
        $user->password = bcrypt('admin123');
        $user->save();
    }
}