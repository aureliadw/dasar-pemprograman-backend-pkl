<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PortofolioSatu;
use App\Models\PortofolioItem;
use App\Models\PortofolioGambar1;
use App\Models\Lpl;

class PortofolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        PortofolioSatu::factory(10)->create()->each(function($portofolio){
            $items = PortofolioItem::factory(rand(1,3))->make();
            $portofolio->items()->saveMany($items);

            $images = PortofolioGambar1::factory(rand(1,3))->make();
            $portofolio->gambar()->saveMany($images);

            $lpl = Lpl::factory()->make();
            $portofolio->lpl()->save($lpl);
        });
    }
}
