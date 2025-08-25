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
        $this->call([
        PembayaranSeeder::class,
        PenawaranSeeder::class,
        PostingProyekSeeder::class,
        UlasanSeeder::class,
        
        ]);
        $this->call(UserSeeder::class);
        
        $this->call(PenawaranSeeder::class);
        $this->call(PostingProyekSeeder::class);
        $this->call(UlasanSeeder::class);
        $this->call(PortofolioSeeder::class);
        $this->call(ManajemenSeeder::class);
    }
}
