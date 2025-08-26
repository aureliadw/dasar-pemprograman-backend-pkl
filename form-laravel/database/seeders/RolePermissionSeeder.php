<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
        'create_portofolio', 'edit_portofolio', 'delete_portofolio', 'view_portofolio',
        'create_pembayaran', 'edit_pembayaran', 'delete_pembayaran', 'view_pembayaran',
        'create_pengajuan', 'edit_pengajuan', 'delete_pengajuan', 'view_pengajuan',
        'create_proyek', 'edit_proyek', 'delete_proyek', 'view_proyek',
        'create_ulasan', 'edit_ulasan', 'delete_ulasan', 'view_ulasan',
        'create_tugas', 'edit_tugas', 'delete_tugas', 'view_tugas',
        'create_manajemen', 'edit_manajemen', 'delete_manajemen', 'view_manajemen',
        'create_registrasi', 'edit_registrasi', 'delete_registrasi', 'view_registrasi',
    ];

    foreach ($permissions as $permission) {
        Permission::firstOrCreate(['name' => $permission]);
    }

    $adminRole = Role::firstOrCreate(['name' => 'admin']);
    $userRole  = Role::firstOrCreate(['name' => 'user']);

    $adminRole->givePermissionTo(Permission::all());

    $userRole->givePermissionTo([
        'view_portofolio',
        'view_pembayaran',
        'view_pengajuan',
        'view_proyek',
        'view_ulasan',
        'view_tugas',
    ]);

    }
}
