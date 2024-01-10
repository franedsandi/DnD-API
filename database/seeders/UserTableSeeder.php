<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usersData = include(base_path('database/seeders/user_data.php'));
        foreach ($users as $usersData){
            $user= new User();
            $user->name = $usersData['name'];
            $user->email = $usersData['email'];
            $user->password = bcrypt($usersData['password']) ;
            $user->save();
        }
    }
}
