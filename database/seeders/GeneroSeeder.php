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
                'nombre' => 'Example_1',
                'imagen' => 'Example_1.jpg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'nombre' => 'Example_2',
                'imagen' => 'Example_2.jpg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'nombre' => 'Example_3',
                'imagen' => 'Example_3.jpg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
