<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\MainController;

Route::get('/', [MainController :: class, 'home'])->name('home');

Route::get('/movie', [MainController :: class, 'homeMovie'])
    ->name('home.movie');

Route :: get('/movie/create', [MainController :: class, 'movieCreate'])
    -> name('movie.create');
Route :: post('/movie/store', [MainController :: class, 'movieStore'])
    -> name('movie.store');    

 Route :: get('/movie/edit/{movie}', [MainController :: class, 'movieEdit'])    
    ->name('movie.edit');
Route :: post('/movie/edit/{movie}', [MainController :: class, 'movieUpdate'])    
    ->name('movie.update');

Route :: get('/movie/delete/{movie}', [MainController :: class, 'movieDelete'])
    ->name('movie.delete');    

 use App\Http\Controllers\ApiController;

Route :: get ('/api/v1/movie/all', [ApiController :: class, 'getMovieWTagWGenre']);   
