<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Page\PageController;
use App\Http\Data\MovieData;

class MovieController extends PageController
{
    protected const SORT_ASC = false;

    protected $dataClass = MovieData::class;
    protected $file = 'movie';

    protected $viewEntry = 'movie';
    protected $viewList  = 'movielist';

    protected function sortList($a, $b):int
    {
        $first  = self::SORT_ASC ? $a : $b;
        $second = self::SORT_ASC ? $b : $a;

        if($first->release !== $second->release) {
            return $first->release > $second->release;
        }
        elseif($first->add !== $second->add) {
            return $first->add > $second->add;
        }
        return $first->id > $second->id;
    }
}
