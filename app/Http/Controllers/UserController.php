<?php

namespace App\Http\Controllers;

use App\Http\Data\UserData;
use Illuminate\View\View;

class UserController extends PageController
{
    protected $dataClass = UserData::class;
    protected $file = 'user';

    protected $viewEntry = 'user';
    protected $viewList  = 'userlist';
}
