<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class UserController extends Controller
{
    public function showList():View
    {
        $jsonPath = './../database/json/user.json';
        $jsonStr = file_get_contents($jsonPath);
        $jsonArr = json_decode($jsonStr, true);

        $list = [];
        foreach($jsonArr as $entry)
        {
            $link = route('user', [
                'userId' => $entry['id'],
                'userName' => $entry['name']['first'] . '-' . $entry['name']['last'],
            ]);
            $link = str_replace(['[', ']'], '', $link);

            $list[] = [
                'link' => $link,
                'name' => implode(' ', $entry['name']),
            ];
        }

        return View('userlist', [
            'list' => $list,
        ]);
    }

    public function showUser(int $userId, string $userName=''):View
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

        return View('user', [
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
