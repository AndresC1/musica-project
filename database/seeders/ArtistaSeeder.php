<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class ArtistaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('artistas')->truncate();
        DB::table('artistas')->insert([
            [
                'nombre' => 'Artist_1',
                'imagen' => 'Artist_1.jpg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'nombre' => 'Artist_2',
                'imagen' => 'Artist_2.jpg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'nombre' => 'Artist_3',
                'imagen' => 'Artist_3.jpg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
