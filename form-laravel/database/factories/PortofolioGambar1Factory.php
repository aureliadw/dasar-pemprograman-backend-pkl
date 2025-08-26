<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PortofolioGambar1Factory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \App\Models\PortofolioGambar1::class;

    public function definition()
    {
        $dummyPath = public_path('dummy.png');
        $filename = Str::slug($this->faker->words(2, true)) . '-' . uniqid() . '.png';
        Storage::disk('public')->put(
            'uploads/portofolio/' . $filename,
            file_get_contents($dummyPath)
        );

        return [
            'file_path' => 'uploads/portofolio/' . $filename,
        ];
    }
}
