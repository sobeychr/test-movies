<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Page\PageController;
use App\Http\Data\UserData;

class UserController extends PageController
{
    protected const SORT_ASC = true;

    protected $dataClass = UserData::class;
    protected $file = 'user';

    protected $viewEntry = 'user';
    protected $viewList  = 'userlist';

    protected function sortList($a, $b):int
    {
        $first  = self::SORT_ASC ? $a : $b;
        $second = self::SORT_ASC ? $b : $a;
        
        if($first->last !== $second->last) {
            return strcmp($first->last, $second->last);
        }
        if($first->first !== $second->first) {
            return strcmp($first->first, $second->first);
        }
        return $first->id > $second->id;
    }
}
