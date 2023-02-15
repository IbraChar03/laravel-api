@extends('layouts.main-layout')
@section('content')
    <h1> MOVIES</h1>
    <ul>
        @foreach ( $movies as $movie )
            <li>
                <h3>{{$movie -> name}}</h3> 
                <a href="{{route('movie.delete',$movie)}}">DELETE</a>    
            </li>
            <br>
            <hr>
        @endforeach
    </ul>
@endsection