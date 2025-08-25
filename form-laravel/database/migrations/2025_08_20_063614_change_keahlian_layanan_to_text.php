<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Backup data lama terlebih dahulu
        $portofolioData = DB::table('portofolio_satu')->select('id', 'keahlian')->get();
        $lplData = DB::table('lpl')->select('id', 'layanan')->get();

        // Ubah tipe kolom keahlian di tabel portofolio_satus
        Schema::table('portofolio_satu', function (Blueprint $table) {
            $table->text('keahlian')->nullable()->change();
        });

        // Ubah tipe kolom layanan di tabel lpls
        Schema::table('lpl', function (Blueprint $table) {
            $table->text('layanan')->nullable()->change();
        });

        // Convert data lama ke format JSON
        foreach ($portofolioData as $item) {
            if ($item->keahlian && !empty($item->keahlian)) {
                // Jika sudah JSON, skip
                if ($this->isValidJson($item->keahlian)) {
                    continue;
                }
                
                // Convert string ke array, lalu ke JSON
                $keahlianArray = [];
                if (strpos($item->keahlian, ',') !== false) {
                    // Jika ada koma, split by comma
                    $keahlianArray = array_map('trim', explode(',', $item->keahlian));
                } else {
                    // Jika tidak ada koma, jadikan single item array
                    $keahlianArray = [$item->keahlian];
                }
                
                DB::table('portofolio_satu')
                    ->where('id', $item->id)
                    ->update(['keahlian' => json_encode($keahlianArray)]);
            }
        }

        foreach ($lplData as $item) {
            if ($item->layanan && !empty($item->layanan)) {
                // Jika sudah JSON, skip
                if ($this->isValidJson($item->layanan)) {
                    continue;
                }
                
                // Convert string ke array, lalu ke JSON
                $layananArray = [];
                if (strpos($item->layanan, ',') !== false) {
                    // Jika ada koma, split by comma
                    $layananArray = array_map('trim', explode(',', $item->layanan));
                } else {
                    // Jika tidak ada koma, jadikan single item array
                    $layananArray = [$item->layanan];
                }
                
                DB::table('lpls')
                    ->where('id', $item->id)
                    ->update(['layanan' => json_encode($layananArray)]);
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('portofolio_satu', function (Blueprint $table) {
            $table->string('keahlian')->nullable()->change();
        });

        Schema::table('lpl', function (Blueprint $table) {
            $table->string('layanan')->nullable()->change();
        });
    }

    private function isValidJson($string): bool
    {
        json_decode($string);
        return json_last_error() === JSON_ERROR_NONE;
    }
};
