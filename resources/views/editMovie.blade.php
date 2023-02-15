@extends('layouts.main-layout')
@section('content')
    <h1>EDIT A MOVIE</h1>
      
   <form action="{{route('movie.update',$movie)}}" method="POST">
    @csrf
    @include("components.errors")
    <label for="">Name : </label>
    <input type="text" name="name" value="{{$movie -> name}}"> <br> <br>
    <label for="cashOut">Cash Out : </label>
    <input type="integer" name="cashOut" value="{{$movie -> cashOut}}"> <br> <br>
    <label for="year">Year : </label>
    <input type="number" name="year" value="{{$movie -> year}}"> <br> <br>
    <label for="genre">Genre : </label>
    <select name="genre" id="">
        @foreach ($genres as $genre)
        <option value="{{$genre -> id}}" 
            @if ($movie -> genre -> id == $genre -> id)
                selected
            @endif
        >
        {{$genre -> name}}</option>
        @endforeach
       
    </select> <br> <br>
    <label for="">Tags : </label> <br>
    @foreach ($tags as $tag)
        <input type="checkbox" value={{$tag -> id}} name=tag[]
        @foreach ($movie -> tags as $tagMovie)
            @if ($tagMovie -> id == $tag -> id)
                checked
            @endif
        @endforeach
        > 
        <label for="tag">{{$tag -> name}}</label> <br>
    @endforeach
    <input type="submit" value="Create">
   </form>
@endsection