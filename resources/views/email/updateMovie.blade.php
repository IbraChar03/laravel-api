@extends('layouts.main-layout')
@section('content')
   
     <span>Someone updated a Movie : </span> <br>
     <strong>Movie Name : </strong>  <span>{{$movie -> name}}</span> <br> 
     <strong>Movie Release Year : </strong>  <span>{{$movie -> year}}</span> <br>
     <strong>Movie Cashout : </strong> <span>{{$movie -> cashOut}}</span> <br>
     <strong>Movie Genre : </strong>  <span>{{$movie -> genre -> name}}</span> <br>
     <strong>Tags : </strong> 
       <ul> 
        @foreach ($movie -> tags as $tag)
           <li>{{$tag -> name}}</li>
       @endforeach 
    </ul>
 
@endsection