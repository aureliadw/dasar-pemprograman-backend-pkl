<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\PortofolioItem;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PortofolioItem>
 */
class PortofolioItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = PortofolioItem::class;

    public function definition()
    {
        return [
            'judul_proyek'      => $this->faker->sentence(3),
            'deskripsi_singkat' => $this->faker->sentence(10),
            'url_proyek'        => $this->faker->url(),
        ];
    }
}
