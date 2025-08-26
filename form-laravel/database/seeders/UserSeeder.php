<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin Form',
                'email_verified_at' => now(),
                'password' => Hash::make('22222222'),
                'tipe_pengguna' => 'Admin',
                'telepon' => '08123456789',
                'bio' => '-',
                'profile_picture' => '1.jpg',
                'remember_token' => Str::random(10),
            ]
        );
        $admin->assignRole('admin'); 

        $klien = User::firstOrCreate(
            ['email' => 'orel@gmail.com'],
            [
                'name' => 'Orel',
                'email_verified_at' => now(),
                'password' => Hash::make('11111111'),
                'tipe_pengguna' => 'Klien',
                'telepon' => '08123456788',
                'bio' => '-',
                'profile_picture' => '2.jpg',
                'remember_token' => Str::random(10),
            ]
        );
        $klien->assignRole('user'); 
    }      
}
