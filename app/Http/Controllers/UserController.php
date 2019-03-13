<?php

namespace App\Http\Controllers;

class UserController extends Controller
{
    public function showList():string
    {
        return '<h1>Users</h1>';
    }

    public function showUser(int $userId, string $userName=''):string
    {
        $str = '<h1>User</h1><h2>'.$userId.'</h2>';
        if($userName) {
            $str .= '<h3>'.$userName.'</h3>';
        }
        return $str;
    }
}
