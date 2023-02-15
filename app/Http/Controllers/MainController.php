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

    public function movieCreate() {

        $genres = Genre::all();

	return view('pages.movie.movieCreate', compact('genres'));
    }

    public function movieStore(Request $request) {

        $data = $request -> validate([
            'name' => 'required|string|max:32',
            'year' => 'required|integer',
            'cashOut' => 'required|integer|min:0',
            'genre_id' => 'required|integer',
        ]);
        
	$movie = new movie();

	$movie -> name = $data['name'];
	$movie -> year = $data['year'];
	$movie -> cashOut = $data['cashOut'];
    
    $genre = Genre :: find($data['genre_id']);
    $movie -> genre() -> associate($genre);

	$movie -> save();

	return redirect() -> route('home');
}
}


