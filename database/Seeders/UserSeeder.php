<?php

namespace Database\Seeders;

use App\User;
use Illuminate\Database\Seeder;
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
        $user = User::create([
                'username' => 'Moon',
                'email' => 'admin@test.com',
                'password' => Hash::make('password'),
        ]);
        $user->roles()->sync(1);
    }
}
