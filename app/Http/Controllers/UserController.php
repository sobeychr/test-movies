<?php

namespace App\Http\Controllers;

class UserController extends Controller
{
    public function showList():string
    {
        return '<h1>Users</h1>';
    }

    public function showUser(int $userId, string $userName='')
    {
        $data = $this->loadUser($userId);
        $name = $data['name']['first'] . '-' . $data['name']['last'];
        $name = strtolower($name);

        if($name !== strtolower($userName)) {
            $route = route('user', [
                'userId'   => $userId,
                'userName' => $name,
            ]);
            $route = str_replace(['[', ']'], '', $route);
            return redirect($route);
        }

        return view('user.user', [
            'title' => ucfirst($data['name']['title']),
            'first' => ucfirst($data['name']['first']),
            'last'  => ucfirst($data['name']['last']),
            'rating' => $data['rating'],
            'total'  => $data['total'],
        ]);
    }

    protected function loadUser(int $userId):array
    {
        $jsonPath = './../database/json/user.json';
        $jsonStr = file_get_contents($jsonPath);
        $jsonArr = json_decode($jsonStr, true);
        return $jsonArr[$userId - 1];
    }
}
