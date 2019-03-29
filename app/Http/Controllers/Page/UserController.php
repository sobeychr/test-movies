<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Page\PageController;
use App\Http\Data\UserData;

class UserController extends PageController
{
    protected $dataClass = UserData::class;
    
    protected $sort = ['name', 'email', 'created', 'id'];

    protected $viewEntry = 'user';
    protected $viewList  = 'userlist';
    protected $viewType  = 'user';
}
