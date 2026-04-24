<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'name'=>'moderator',
            'email'=>'moderator@mail.ru',
            'password'=>Hash::make('123456'),
            'role_id'=>1
        ]);

        \App\Models\User::create([
            'name'=>'reader',
            'email'=>'reader@mail.ru',
            'password'=>Hash::make('123456'),
            'role_id'=>2
        ]);
    }
}
