<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Pembayaran;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pembayaran>
 */
class PembayaranFactory extends Factory
{
    protected $model = Pembayaran::class;

    public function definition()
    {
        $metode = ['Transfer Bank', 'E-Wallet', 'Cash On Delivery'];

        return [
            'jumlah_pembayaran' => $this->faker->numberBetween(100000, 1000000),
            'metode_pembayaran' => $this->faker->randomElement($metode),
            'setuju_syarat' => $this->faker->boolean(),
        ];
    }   
}
