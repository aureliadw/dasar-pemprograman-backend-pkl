<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PostingProyek>
 */
class PostingProyekFactory extends Factory
{
    protected $model = \App\Models\PostingProyek::class;

    public function definition()
    {
        $kategoriOptions = ['Pengembangan Web', 'Pengembangan Mobile', 'Desain Grafis'];
        $lokasiOptions = ['onsite', 'remote'];
        $lampiranOptions = [
            'foto1.jpg', 'logo1.png', 'app_mockup.jpg', 'web_design.png',
            'brosur1.jpg', 'booking_system.jpg', 'animasi1.gif',
            'game_mockup.png', 'seo_report.pdf', 'video1.mp4'
        ];

        return [
            'detail_proyek' => $this->faker->sentence(4, true),
            'deskripsi' => $this->faker->paragraph(2, true),
            'kategori' => $this->faker->randomElement($kategoriOptions),
            'anggaran' => $this->faker->numberBetween(1000000, 10000000),
            'batas_penawaran' => $this->faker->dateTimeBetween('now', '+2 months')->format('Y-m-d'),
            'lampiran' => $this->faker->randomElement($lampiranOptions),
            'lokasi_pengerjaan' => $this->faker->randomElement($lokasiOptions),
        ];
    }
}
