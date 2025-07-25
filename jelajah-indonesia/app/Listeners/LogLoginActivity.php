<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogLoginActivity
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \Illuminate\Auth\Events\Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
         // Ambil data pengguna yang login
         $user = $event->user;

         // Simpan atau perbarui data pengguna di tabel penggunas
         DB::table('pengguna')->where('id', $user->id)->update([
             'last_login_at' => now(), // Menyimpan waktu login terakhir
             'email' => $user->email,  // Menyimpan email pengguna
             'updated_at' => now(),    // Pastikan updated_at diperbarui
         ]);
    }
}
