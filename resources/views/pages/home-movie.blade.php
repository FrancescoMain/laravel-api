@extends('layouts.main-layout')

@section('content')
    
    <h1>MOVIES</h1>
    <ul>
        @foreach ($movies as $movie)
            @include('components.movie.movie-elem')
        @endforeach
    </ul>

@endsection