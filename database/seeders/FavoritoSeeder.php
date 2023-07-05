<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Cancion;
use App\Models\Album;
use App\Models\Artista;
use App\Models\Favorito;

class FavoritoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table("favoritos")->truncate();
        $user = User::find(1);
        $favoriteSong = new Favorito();
        $favoriteSong->user()->associate($user);
        $favoriteSong->favoritable()->associate(Cancion::find(1));
        $favoriteSong->save();
        
        $favoriteSong2 = new Favorito();
        $favoriteSong2->user()->associate($user);
        $favoriteSong2->favoritable()->associate(Album::find(1));
        $favoriteSong2->save();

        $favoriteSong3 = new Favorito();
        $favoriteSong3->user()->associate($user);
        $favoriteSong3->favoritable()->associate(Artista::find(1));
        $favoriteSong3->save();

        $favoriteSong4 = new Favorito();
        $favoriteSong4->user()->associate($user);
        $favoriteSong4->favoritable()->associate(Cancion::find(2));
        $favoriteSong4->save();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
