<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tables = [
            'pembayaran',
            'penawaran',
            'posting_proyek',
            'ulasan',
            'portofolio_satu',
            'portofolio_gambar1',
            'portofolio_item',
            'lpl',
            'manajemen_tugas',
            'users',
        ];

        foreach ($tables as $table) {
            Schema::table($table, function (Blueprint $table) {
                $table->softDeletes();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $tables = [
            'pembayaran',
            'penawaran',
            'posting_proyek',
            'ulasan',
            'portofolio_satu',
            'portofolio_gambar1',
            'portofolio_item',
            'lpl',
            'manajemen_tugas',
            'users',
        ];

        foreach ($tables as $table) {
            Schema::table($table, function (Blueprint $table) {
                $table->dropSoftDeletes();
            });
        }
    }
};
