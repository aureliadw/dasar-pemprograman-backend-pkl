<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\PortofolioSatu;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PortofolioSatu>
 */
class PortofolioSatuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = PortofolioSatu::class;

    public function definition()
    {
        return [
            'judul_portofolio' => $this->faker->sentence(3),
            'ringkasan'        => $this->faker->paragraph(),
            'keahlian'         => json_encode(
                $this->faker->randomElements(
                    ['Pengembangan Aplikasi Mobile','Penulisan Konten','Pemasaran Digital','Desain UI/UX','SEO'],
                    rand(1,3)
                )
            ),
            'warna_tema'       => $this->faker->safeHexColor(),
        ];
    }
}
