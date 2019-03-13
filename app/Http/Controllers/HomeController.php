<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function showHome():string
    {
        return '<h1>Home</h1>';
    }
}
