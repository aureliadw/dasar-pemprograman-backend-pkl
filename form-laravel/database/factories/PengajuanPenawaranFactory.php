<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\PengajuanPenawaran;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PengajuanPenawaranFactory extends Factory
{
    protected $model = PengajuanPenawaran::class;

    public function definition()
    {
        $pesanOptions = [
            'Kami menawarkan pengerjaan dengan kualitas premium.',
            'Penawaran terbaik untuk pengerjaan cepat.',
            null, 
        ];

        return [
            'jumlah_penawaran' => $this->faker->numberBetween(500000, 5000000),
            'pesan' => $this->faker->randomElement($pesanOptions),
            'durasi_pengerjaan' => $this->faker->numberBetween(3, 15),
        ];
    }
}
