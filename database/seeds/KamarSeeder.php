<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Jeniskamar;
use App\Location;
use App\Location_detail;
use App\Kamar;
use App\Kamar_detail;

class KamarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jeniskamar::create([
            'name' => 'AC',
            'description' => 'Kamar AC dengan PLN dan Kamar Mandi Dalam',
            'listrik' => 'PLN',
            'kamar_mandi' => 'dalam',
            'thumbnail' => 'AC_1585910941.jpg',
        ]);

        Jeniskamar::create([
            'name' => 'Non AC',
            'description' => 'Kamar Non AC dengan PLN dan Kamar Mandi Dalam',
            'listrik' => 'PLN',
            'kamar_mandi' => 'dalam',
            'thumbnail' => 'Non AC_1585913500.jpg',
        ]);

        Location::create([
            'name' => 'Tangerang',
            'description' => 'Villa melati mas blok i 5 no 16 Tangerang Selatan 15323',
            'image' => 'default.jpg',
            'Status' => 'A',
        ]);

        Location_detail::create([
            'location_id' => '1',
            'image' => 'Tangerang_1585913661.jpg',
            'status' => 'A',
        ]);

        Kamar::create([
            'user_id' => '',
            'jeniskamar_id' => '1',
            'location_id' => '1',
            'name' => 'Kamar Tangerang',
            'description' => 'Kamar yang berlokasi di Tangerang dengan AC, PLN dan Kamar mandi dalam',
            'number' => '1',
            'floor' => '1',
            'harga' => '1300000',
            'status' => 'A',
        ]);
        Kamar::create([
            'user_id' => '',
            'jeniskamar_id' => '1',
            'location_id' => '1',
            'name' => 'Kamar Tangerang',
            'description' => 'Kamar yang berlokasi di Tangerang dengan AC, PLN dan Kamar mandi dalam',
            'number' => '2',
            'floor' => '2',
            'harga' => '1300000',
            'status' => 'A',
        ]);
        Kamar::create([
            'user_id' => '',
            'jeniskamar_id' => '2',
            'location_id' => '1',
            'name' => 'Kamar Tangerang',
            'description' => 'Kamar Non AC dengan PLN dan Kamar Mandi Dalam',
            'number' => '3',
            'floor' => '2',
            'harga' => '900000',
            'status' => 'A',
        ]);

        Kamar_detail::create([
            'kamar_id' => '1',
            'image' => 'Kamar Tangerang_1585913859.jpg',
            'status' => 'A',
        ]);
        Kamar_detail::create([
            'kamar_id' => '1',
            'image' => 'Kamar Tangerang_1585913869.jpg',
            'status' => 'A',
        ]);
        Kamar_detail::create([
            'kamar_id' => '1',
            'image' => 'Kamar Tangerang_1585913879.jpg',
            'status' => 'A',
        ]);
        Kamar_detail::create([
            'kamar_id' => '2',
            'image' => 'Kamar Tangerang_1585913894.jpg',
            'status' => 'A',
        ]);
        Kamar_detail::create([
            'kamar_id' => '2',
            'image' => 'Kamar Tangerang_1585913902.jpg',
            'status' => 'A',
        ]);
        Kamar_detail::create([
            'kamar_id' => '3',
            'image' => 'Kamar Tangerang_1585913925.jpg',
            'status' => 'A',
        ]);
        Kamar_detail::create([
            'kamar_id' => '3',
            'image' => 'Kamar Tangerang_1585913936.jpg',
            'status' => 'A',
        ]);


    }
}
