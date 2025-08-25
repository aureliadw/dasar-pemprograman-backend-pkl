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
        Schema::create('posting_proyek', function (Blueprint $table) {
            $table->id();
            $table->string('detail_proyek');
            $table->text('deskripsi');
            $table->enum('kategori', ['Pengembangan Web', 'Desain Grafis', 'Pengembangan Mobile']);
            $table->unsignedBigInteger('anggaran');
            $table->date('batas_penawaran');
            $table->string('lampiran')->nullable();
            $table->enum('lokasi_pengerjaan', ['onsite', 'remote']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posting_proyek');
    }
};
