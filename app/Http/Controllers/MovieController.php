<?php

namespace App\Http\Controllers;

use App\Http\Data\MovieData;

class MovieController extends PageController
{
    protected $dataClass = MovieData::class;
    protected $file = 'movie';

    protected $viewEntry = 'movie';
    protected $viewList  = 'movielist';
}
