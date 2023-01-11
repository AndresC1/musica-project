<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class cancion_artistaSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('cancion_artistas')->truncate();
        DB::table('cancion_artistas')->insert([
            [
                'IdCancion' => 1,
                'IdArtistas' => 2,
            ],
            [
                'IdCancion' => 1,
                'IdArtistas' => 1,
            ],
            [
                'IdCancion' => 2,
                'IdArtistas' => 3,
            ],
            [
                'IdCancion' => 3,
                'IdArtistas' => 3,
            ]
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
