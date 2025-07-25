<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Folder;
use App\Models\File;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    
    public function run()
    {
        $root = folder::create([
            'name' => 'Documents'
        ]);

        $sub = folder::create([
            'name' => 'Laporan',
            'parent_id' => $root->id
        ]);

        file::create([
            'name' => 'laporan1.pdf',
            'folder_id' => $sub->id
        ]);
    }
}
