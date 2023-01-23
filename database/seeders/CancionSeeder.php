<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class CancionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('cancions')->truncate();
        DB::table('cancions')->insert([
            [
                'nombre' => 'La neverita',
                'imagen' => 'UnVeranoSinTi.jpg',
                'archCancion' => 'Song_1.mp3',
                'color' => '#ac6432',
                'anio' => '2022',
                'IdGenero' => 1,
                'IdAlbum' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'nombre' => 'Pasatiempo',
                'imagen' => 'Legendary.jpg',
                'archCancion' => 'Song_2.mp3',
                'color' => '#bdbdbb',
                'anio' => '2022',
                'IdGenero' => 2,
                'IdAlbum' => 2,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'nombre' => 'Campeon',
                'imagen' => 'Legendary.jpg',
                'archCancion' => 'Song_3.mp3',
                'color' => '#bdbdbb',
                'anio' => '2022',
                'IdGenero' => 1,
                'IdAlbum' => 2,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
