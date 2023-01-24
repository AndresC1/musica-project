<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class GeneroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('generos')->truncate();
        DB::table('generos')->insert([
            [
                'nombre' => 'POP',
                'imagen' => 'Pop.jpg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'nombre' => 'Rock',
                'imagen' => 'Rock.jpg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'nombre' => 'Bachata',
                'imagen' => 'Bachata.jpg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'nombre' => 'Reggaeton',
                'imagen' => 'Reggaeton.jpg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'nombre' => 'Salsa',
                'imagen' => 'Salsa.jpg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'nombre' => 'Banda',
                'imagen' => 'Banda.jpg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'nombre' => 'Merengue',
                'imagen' => 'Merengue.jpg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'nombre' => 'Cumbia',
                'imagen' => 'Cumbia.jpg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'nombre' => 'Disco',
                'imagen' => 'Disco.jpg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'nombre' => 'Electronica',
                'imagen' => 'Electronica.jpg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
