<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetailProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //insert data ke table detail profile
        DB::table('detail_profile')->insert([
            'address' => 'Jember',
            'no_telp' => '0812345678901',
            'ttl' => '2003-11-09',
            'foto' => 'picture.png'
        ]);
    }
}
