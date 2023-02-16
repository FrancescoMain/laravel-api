<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Movie;
use App\Models\Genre;
use App\Models\Tag;

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
        $tags = Tag::all();

	return view('pages.movie.movieCreate', compact('genres', 'tags'));
    }

    public function movieStore(Request $request) {

        $data = $request -> validate([
            'name' => 'required|string|max:32',
            'year' => 'required|integer',
            'cashOut' => 'required|integer|min:0',
            'genre_id' => 'required|integer',
            'tags_id' => 'required|array',

        ]);
        
	// $movie = new movie();

	// $movie -> name = $data['name'];
	// $movie -> year = $data['year'];
	// $movie -> cashOut = $data['cashOut'];
    
    $genre = Genre :: find($data['genre_id']);
    $movie = Movie :: make($data);

    $movie -> genre() -> associate($genre);
	$movie -> save();

    $tags = Tag :: find($data['tags_id']);
    $movie -> tags() -> sync($tags);

	return redirect() -> route('home');
    }

    public function movieEdit (Movie $movie) {

        $genres = Genre :: all();
        $tags = Tag :: all();

        return view('pages.movie.update' , compact('movie', 'genres', 'tags'));
    }

    public function movieUpdate (Request $request, Movie $movie) {

        $data = $request -> validate([
            'name' => 'required|string|max:32',
            'year' => 'required|integer',
            'cashOut' => 'required|integer|min:0',
            'genre_id' => 'required|integer',
            'tags_id' => 'required|array',

        ]);
        
    
    $genre = Genre :: find($data['genre_id']);
    $movie -> update($data);


    $tags = Tag :: find($data['tags_id']);
    $movie -> tags() -> sync($tags);

	return redirect() -> route('home');



    }

    public function movieDelete (Movie $movie) {

        $movie -> $tags() -> sync([]);
        $movie -> delete();

        return redirect() -> route ('home');

    }
}


