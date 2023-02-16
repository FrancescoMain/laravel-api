@extends('layouts.main-layout')

@section('content')
    
    <h1>New movie</h1>
    <form method="POST" action="{{route('movie.update', $movie)}}">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name"  value="{{$movie -> name}}">
        <br>
        <label for="year">Year</label>
        <input type="number" name="year" value="{{$movie -> year}}">
        <br>
        <label for="cashOut">Cash Out</label>
        <input type="number" name="cashOut" value="{{$movie -> cashOut}}">
        <br>
        <select name="genre_id">
            @foreach ($genres as $genre)
            <option value="{{ $genre -> id }}"
            @selected ($movie -> genre -> id == $genre -> id)
            >


                {{ $genre -> name }}
            </option>
            @endforeach
        </select>
        <br>
        <label>Tag</label>
        @foreach ($tags as $tag)
            <input 
            type="checkbox" 
            name="tags_id[]" 
            value="{{$tag -> id}}" 
            id="{{$tag -> id}}"
                @foreach ($movie -> tags as $movieTag)
                    @checked($movieTag -> id == $tag -> id)
                @endforeach    
            >
            <label for="{{$tag -> id}}">{{$tag -> name}}</label>
        @endforeach
        <input type="submit" value="CREATE NEW MOVIE">
    </form>

@endsection