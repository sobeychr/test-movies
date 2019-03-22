<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\View\ViewController;
use Illuminate\View\View;

class HomeController extends ViewController
{
    public function showHome():View
    {
        return View('pages.home', [
            'nav' => $this->getNav(),
        ]);
    }
}
