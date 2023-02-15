@extends('layouts.main-layout')
@section('content')
    <h1>GENRES AND MOVIES</h1>
    <h3>
        <a href="{{route('movies')}}">Movies</a>
       </h3>
    <ul>
        @foreach ( $genres as $genre )
            <li>
                <h2>{{$genre -> name}}</h2>
                @foreach ($genre -> movies as $movie)
                    <li>
                        {{$movie -> name}}
                    </li>
                @endforeach
            </li>
            <br>
            <hr>
        @endforeach
    </ul>
@endsection