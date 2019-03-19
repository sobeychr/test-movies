<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class MovieController extends Controller
{
    public function showList():View
    {
        $jsonPath = './../database/json/movie.json';
        $jsonStr = file_get_contents($jsonPath);
        $jsonArr = json_decode($jsonStr, true);

        $list = [];
        foreach($jsonArr as $entry)
        {
            $link = route('movie', [
                'movieId' => $entry['id'],
                'movieName' => str_replace(' ', '-', $entry['name']),
            ]);
            $link = str_replace(['[', ']'], '', $link);

            $list[] = [
                'link' => $link,
                'name' => $entry['name'],
            ];
        }

        return View('movielist', [
            'list' => $list,
        ]);
    }

    public function showMovie(int $movieId, string $movieName=''):string
    {
        $str = '<h1>Movie</h1><h2>'.$movieId.'</h2>';
        if($movieName) {
            $str .= '<h3>'.$movieName.'</h3>';
        }
        return $str;
    }

    protected function loadMovie(int $movieId):array
    {
        $jsonPath = './../database/json/movie.json';
        $jsonStr = file_get_contents($jsonPath);
        $jsonArr = json_decode($jsonStr, true);
        return $jsonArr[$movieId - 1];
    }
}
