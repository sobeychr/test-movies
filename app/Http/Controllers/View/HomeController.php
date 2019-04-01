<?php

namespace App\Http\Controllers\View;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\View\View;

class HomeController extends BaseController
{
    public function showHome():View
    {
        return View('pages.home');
    }
}
