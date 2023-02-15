@extends('layouts.main-layout')
@section('content')
    <h1>CREATE A NEW MOVIE</h1>
      
   <form action="{{route('movie.create')}}" method="POST">
    @csrf
    @include("components.errors")
    <label for="">Name : </label>
    <input type="text" name="name"> <br> <br>
    <label for="cashOut">Cash Out : </label>
    <input type="integer" name="cashOut"> <br> <br>
    <label for="year">Year : </label>
    <input type="number" name="year"> <br> <br>
    <label for="genre">Genre : </label>
    <select name="genre" id="">
        @foreach ($genres as $genre)
        <option value="{{$genre -> id}}">
        {{$genre -> name}}</option>
        @endforeach
       
    </select> <br> <br>
    <label for="">Tags : </label> <br>
    @foreach ($tags as $tag)
        <input type="checkbox" value={{$tag -> id}} name=tag[]> 
        <label for="tag">{{$tag -> name}}</label> <br>
    @endforeach
    <input type="submit" value="Create">
   </form>
@endsection