<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    public function showHome():View
    {
        $links = [
            'movieList' => route('movieList'),
            'userList'  => route('userList'),
        ];
        return view('home', $links);
    }
}
