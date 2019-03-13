<?php

namespace App\Http\Controllers;

class MovieController extends Controller
{
    public function showList():string
    {
        return '<h1>Movies</h1>';
    }

    public function showMovie(int $movieId, string $movieName=''):string
    {
        $str = '<h1>Movie</h1><h2>'.$movieId.'</h2>';
        if($movieName) {
            $str .= '<h3>'.$movieName.'</h3>';
        }
        return $str;
    }
}
