@extends('layouts.main-layout')

@section('content')
    
    <h1>Films</h1>

    <a href="{{ route('home.movie') }}">TUTTI I FILM</a>
    @foreach ($genres as $genre)
        <h2>{{ $genre -> name }}</h2>
        <ul>
            @foreach ($genre -> movies as $movie)
                @include('components.movie.movie-elem')
            @endforeach
        </ul>
    @endforeach

@endsection