<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class TestController extends Controller
{
    public function generateAnticipations():JsonResponse
    {
        $movieArr = $this->loadJson('movie');
        $userArr  = $this->loadJson('user');

        $start = '-2 weeks';
        $end   = '+1 week';

        $i = 0;
        $list = [];

        foreach($movieArr as $movie)
        {
            $amount = rand(0, 12);
            $entry = [];

            for($j=0; $j<$amount; $j++)
            {
                $i++;
                $user = $userArr[ array_rand($userArr,1) ];

                $entry[] = [
                    'id' => $i,
                    'user' => $user['id'],
                    'date' => $this->getDateFromInterval($start, $end, $movie['release']),
                    'want' => rand(0, 1),
                ];
            }

            $list[$movie['id']] = $entry;
        }

        return response()->json($list, 200);
    }

    public function generateMovies():JsonResponse
    {
        $totalMovies = 50;
        $startDate = strtotime('2016-01-01');
        $endDate   = strtotime('2020-01-01');

        $nameStr = 'Lorem ipsum dolor sit amet consectetur adipiscing elit Nullam condimentum vitae tellus eu venenatis Sed sem risus aliquam id orci id facilisis euismod mi Nullam vel volutpat orci Donec luctus viverra urna non imperdiet Pellentesque varius volutpat nulla ac laoreet eros varius sit amet Fusce quis velit et nisi cursus interdum Phasellus vel pretium tellus nec vestibulum purus Duis elementum vehicula libero et mollis Nulla facilisi Duis fringilla iaculis aliquam Fusce ut commodo elit';
        $nameStrLen = strlen($nameStr);

        $list = [];

        for($i=1; $i<=$totalMovies; $i++)
        {
            $nameLen = rand(5, 15);
            $nameStart = rand(0, $nameStrLen - $nameLen);
            $name = substr($nameStr, $nameStart, $nameLen);

            $release = rand($startDate, $endDate);
            $release = $this->roundDay($release);

            $add = $this->getDateFromInterval('-2 months', '-6 days', $release);

            $list[] = [
                'id' => $i,
                'name' => $name,
                'add' => $add,
                'release' => $release,
                //'dayA' => date('Y-m-d H:i:s', $add),
                //'dayR' => date('Y-m-d H:i:s', $release),
                'boxoffice' => '',
                'trailer' => [],
                'dissenter' => '',
            ];
        }

        return response()->json($list, 200);
    }

    public function generateRates():JsonResponse
    {
        $movieArr = $this->loadJson('movie');
        $userArr  = $this->loadJson('user');

        $start = 'now';
        $end   = '+2 weeks';

        $i = 0;
        $list = [];

        foreach($movieArr as $movie)
        {
            $amount = rand(0, 12);
            $entry = [];

            for($j=0; $j<$amount; $j++)
            {
                $i++;
                $rate = rand(0, 100);
                $rate = round($rate * .2) * 5;
                $rate = round($rate * .01, 2);
                $user = $userArr[ array_rand($userArr,1) ];

                $entry[] = [
                    'id' => $i,
                    'user' => $user['id'],
                    'date' => $this->getDateFromInterval($start, $end, $movie['release']),
                    'rate' => $rate,
                ];
            }

            $list[$movie['id']] = $entry;
        }

        return response()->json($list, 200);
    }

    public function generateUsers():JsonResponse
    {
        $jsonArr = $this->loadJson('user');

        $i = 0;
        foreach($jsonArr as &$entry)
        {
            $i++;
            $rating = rand(0, 100) * .01;

            $entry['id'] = $i;
            $entry['rating'] = 0;
        }

        return response()->json($jsonArr, 200);
    }

    protected function getDateFromInterval(string $startDate, string $endDate, int $timestamp=-1):int
    {
        if($timestamp < 0) {
            $timestamp = now();
        }
        return rand(
            strtotime($startDate, $timestamp),
            strtotime($endDate,   $timestamp)
        );
    }

    protected function loadJson(string $filename):array
    {
        $jsonPath = './../database/json/'. $filename .'.json';
        $jsonStr = file_get_contents($jsonPath);
        $jsonArr = json_decode($jsonStr, true);
        return $jsonArr;
    }

    protected function roundDay(int $timestamp):int
    {
        $day = 60*60*24;
        $prev = $timestamp - ($timestamp % $day);
        return $prev + $day;
    }
}
