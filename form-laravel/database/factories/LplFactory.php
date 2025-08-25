<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lpl>
 */
class LplFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \App\Models\Lpl::class;

    public function definition()
    {
        return [
            'longitude' => $this->faker->longitude(),
            'latitude' => $this->faker->latitude(),
            'terbuka_klien' => $this->faker->boolean(),
            'layanan' => json_encode($this->faker->randomElements(
                ['Konsultasi','Maintenance','Pelatihan'], rand(1,3)
            )),
            'setuju' => $this->faker->boolean(),
        ];
    }
}
