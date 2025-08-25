<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ulasan>
 */
class UlasanFactory extends Factory
{
    protected $model = \App\Models\Ulasan::class;

    public function definition()
    {
        $komentarOptions = [
            'Pelayanan sangat memuaskan, proyek selesai tepat waktu.',
            'Hasil sesuai ekspektasi, meskipun ada sedikit revisi.',
            'Proyek selesai tapi agak telat dari deadline.',
            'Kualitas kerja sangat baik dan komunikatif.',
            'Kurang memuaskan, banyak revisi yang diperlukan.',
            'Kerja bagus, hanya saja sedikit telat.',
            'Sangat profesional dan hasilnya memuaskan.',
            'Biasa saja, sesuai harga yang dibayarkan.',
            'Kerja rapi, tapi komunikasi kurang cepat.',
            'Luar biasa, akan menggunakan jasa ini lagi.',
        ];

        return [
            'rating' => $this->faker->numberBetween(2, 5),
            'komentar' => $this->faker->randomElement($komentarOptions),
        ];
    }
}
