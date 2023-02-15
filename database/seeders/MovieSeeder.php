<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Movie;
use App\Models\Genre;
use App\Models\Tag;


class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Movie :: factory() -> count(100) -> make() -> each(function($p){

            $genre = Genre :: inRandomOrder() -> first();
            $p -> genre() -> associate($genre);
            $p -> save();
        });
    }
}
