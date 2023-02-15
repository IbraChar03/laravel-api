<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class MainController extends Controller
{
    public function home()
    {
        $genres = Genre::all();
        return view("home", compact("genres"));
    }
}