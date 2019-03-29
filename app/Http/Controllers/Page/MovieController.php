<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Page\PageController;
use App\Http\Data\MovieData;

class MovieController extends PageController
{
    protected $dataClass = MovieData::class;

    protected $sort = ['release', 'created', 'id'];

    protected $viewEntry = 'movie';
    protected $viewList  = 'movielist';
    protected $viewType  = 'movie';
}
