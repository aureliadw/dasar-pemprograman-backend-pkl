<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Penting: role & permission dulu
        $this->call([
            RolePermissionSeeder::class,
            UserSeeder::class,
        ]);

        // Seeder lain bisa jalan setelah user
        $this->call([
            PembayaranSeeder::class,
            PenawaranSeeder::class,
            PostingProyekSeeder::class,
            UlasanSeeder::class,
            PortofolioSeeder::class,
            ManajemenSeeder::class,
        ]);
    }
}
