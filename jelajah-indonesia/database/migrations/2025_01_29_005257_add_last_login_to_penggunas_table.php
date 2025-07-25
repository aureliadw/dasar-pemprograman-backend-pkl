<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLastLoginToPenggunasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('penggunas', function (Blueprint $table) {
            $table->timestamp('last_login_at')->nullable(); // Menyimpan waktu login terakhir
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('penggunas', function (Blueprint $table) {
            $table->dropColumn('last_login_at');
        });
    }
}
