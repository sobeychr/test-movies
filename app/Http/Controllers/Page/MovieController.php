<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Page\PageController;
use App\Http\Data\MovieData;
use App\Http\Data\RateData;
use Illuminate\Support\Facades\DB;

class MovieController extends PageController
{
    protected $dataClass = MovieData::class;

    protected $sort = ['release', 'created', 'id'];

    protected $viewEntry = 'movie';
    protected $viewList  = 'movielist';
    protected $viewType  = 'movie';

    protected function getRating(int $id):array
    {
        return RateData::where('movie', $id)
            ->orderBy('date')
            ->pluck('rate', 'date')
            ->toArray();
    }
}
