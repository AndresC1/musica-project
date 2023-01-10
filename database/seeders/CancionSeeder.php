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
                'nombre' => 'Example_song_1',
                'imagen' => 'Example_song_1.jpg',
                'archCancion' => 'Song_1.mp3',
                'color' => '#efefef',
                'anio' => '2022',
                'IdGenero' => 1,
                'IdAlbum' => 1,
                'IdArtistas' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'nombre' => 'Example_song_2',
                'imagen' => 'Example_song_2.jpg',
                'archCancion' => 'Song_2.mp3',
                'color' => '#efefef',
                'anio' => '2022',
                'IdGenero' => 2,
                'IdAlbum' => 2,
                'IdArtistas' => 2,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'nombre' => 'Example_song_3',
                'imagen' => 'Example_song_3.jpg',
                'archCancion' => 'Song_3.mp3',
                'color' => '#efefef',
                'anio' => '2022',
                'IdGenero' => 3,
                'IdAlbum' => 3,
                'IdArtistas' => 3,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
