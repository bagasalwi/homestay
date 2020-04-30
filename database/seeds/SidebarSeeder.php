<?php

use Illuminate\Database\Seeder;

class SidebarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sidebar')->insert([
            'role_id' => '2',
            'name' => 'Dashboard',
            'icon' => 'fas fa-home',
            'url' => 'dashboard',
            'master' => 'Dashboard',
        ]);
        DB::table('sidebar')->insert([
            'role_id' => '2',
            'name' => 'Kelola User',
            'icon' => 'fas fa-users-cog',
            'url' => 'user',
            'master' => 'Menu',
        ]);
        DB::table('sidebar')->insert([
            'role_id' => '2',
            'name' => 'Lokasi',
            'icon' => 'fas fa-map-marker-alt',
            'url' => 'location',
            'master' => 'Menu',
        ]);
        DB::table('sidebar')->insert([
            'role_id' => '2',
            'name' => 'Jenis Kamar',
            'icon' => 'fas fa-list',
            'url' => 'jeniskamar',
            'master' => 'Menu',
        ]);
        DB::table('sidebar')->insert([
            'role_id' => '2',
            'name' => 'Kamar',
            'icon' => 'fas fa-door-open',
            'url' => 'kamar',
            'master' => 'Menu',
        ]);
        DB::table('sidebar')->insert([
            'role_id' => '2',
            'name' => 'Pesanan',
            'icon' => 'fas fa-shopping-cart',
            'url' => 'pesanan',
            'master' => 'Menu',
        ]);

        // TRANSACTION MENU
        DB::table('sidebar')->insert([
            'role_id' => '1',
            'name' => 'My Dashboard',
            'icon' => 'fas fa-home',
            'url' => 'mydashboard',
            'master' => 'Menu',
        ]);
        DB::table('sidebar')->insert([
            'role_id' => '1',
            'name' => 'Status Kamar',
            'icon' => 'fas fa-question-circle',
            'url' => 'statuskamar',
            'master' => 'Menu',
        ]);
        DB::table('sidebar')->insert([
            'role_id' => '1',
            'name' => 'List Transaksi',
            'icon' => 'fas fa-list',
            'url' => 'list-transaksi',
            'master' => 'Menu',
        ]);
        DB::table('sidebar')->insert([
            'role_id' => '1',
            'name' => 'My Profile',
            'icon' => 'fas fa-user-circle',
            'url' => 'myprofile',
            'master' => 'Menu',
        ]);
    }
}
