<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUlasansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ulasans', function (Blueprint $table) {
            $table->id(); // bigint unsigned secara default
            $table->foreignId('id_pengguna')->constrained('penggunas')->onDelete('cascade'); // Foreign key
            $table->foreignId('id_wisata')->constrained('wisatas')->onDelete('cascade'); // Foreign key
            $table->date('tanggal_ulasan');
            $table->text('komentar');
            $table->tinyInteger('peringkat')->unsigned(); // Untuk rating 1-5
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
        Schema::dropIfExists('ulasans');
    }
}
