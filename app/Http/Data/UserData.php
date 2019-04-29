<?php

namespace App\Http\Data;

class UserData extends PageData
{
    protected $route = 'user';
    protected $table = 'user';

    protected $attributes = [
        /*
        'id'   => 0,
        'name' => string,
        'gender' => bool,
        'email'  => string,
        'created' => timestamp,
        'updated' => timestamp,
        'deleted' => timestamp
        */
    ];
}
