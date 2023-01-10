<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('albums')->truncate();
        DB::table('albums')->insert([
            [
                'nombre' => 'Album_1',
                'imagen' => 'Album_1.jpg',
                'IdArtista' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'nombre' => 'Album_2',
                'imagen' => 'Album_2.jpg',
                'IdArtista' => 2,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'nombre' => 'Album_3',
                'imagen' => 'Album_3.jpg',
                'IdArtista' => 3,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
