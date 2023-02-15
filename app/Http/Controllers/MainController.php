<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Movie;
use App\Models\Genre;

class MainController extends Controller
{
    
    public function home() {

        $genres = Genre :: all();

        // $data = [
        //     'tasks' => $tasks
        // ];

        return view('pages.home', compact('genres'));
    }
}
