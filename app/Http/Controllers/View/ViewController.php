<?php

namespace App\Http\Controllers\View;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ViewController extends BaseController
{
    protected $uri = '';

    public function __construct(Request $request)
    {
        $this->uri = $request->path();
    }

    protected function getNav():array
    {
        $nav = [];

        if($this->uri !== '/' && $this->uri !== 'home') {
            $nav['home'] = '/';
        }
        if($this->uri !== 'movie') {
            $nav['movie'] = route('movielist');
        }
        if($this->uri !== 'user') {
            $nav['user'] = route('userlist');
        }

        return $nav;
    }
}
