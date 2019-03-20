<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    public function showHome():View
    {
        $links = [
            'movielist' => route('movielist'),
            'userlist'  => route('userlist'),
        ];
        return view('pages.home', $links);
    }
}
