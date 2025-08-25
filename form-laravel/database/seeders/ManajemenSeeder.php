<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ManajemenTugas;
use Carbon\Carbon;

class ManajemenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = ['belum_mengisi', 'dalam_proses', 'selesai'];

        for ($i = 1; $i <= 10; $i++) {
            ManajemenTugas::create([
                'judul'     => "Tugas Proyek #$i",
                'deskripsi' => "Deskripsi singkat untuk tugas proyek nomor $i.",
                'batas'     => Carbon::now()->addDays(rand(3, 30)),
                'status'    => $statuses[array_rand($statuses)],
                'progres'   => rand(0, 100),
                'aksi'      => 'Belum ada catatan aksi',
            ]);
        }
    } 
}
