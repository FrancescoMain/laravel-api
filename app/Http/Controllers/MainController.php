<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Movie;
use App\Models\Genre;

class MainController extends Controller
{
    
    public function home() {

        $genres = Genre :: all();

        return view('pages.home', compact('genres'));
    }

        public function homeMovie() {

        $movies = Movie :: all();

        return view('pages.home-movie', compact('movies'));
    }
}


