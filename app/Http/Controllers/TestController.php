<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class TestController extends Controller
{
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
            $release = rand($startDate, $endDate);

            $nameLen = rand(5, 15);
            $nameStart = rand(0, $nameStrLen - $nameLen);
            $name = substr($nameStr, $nameStart, $nameLen);

            $list[] = [
                'id' => $i,
                'name' => $name,
                'added' => strtotime('-3 weeks', $release),
                'release' => $release,
                'boxoffice' => '',
                'trailer' => [],
                'dissenter' => '',

                'anticipation' => [],
                'rating' => [],
            ];
        }

        return response()->json($list, 200);
    }

    public function generateUsers():JsonResponse
    {
        $jsonPath = './../database/json/user.json';
        $jsonStr = file_get_contents($jsonPath);
        $jsonArr = json_decode($jsonStr, true);

        $i = 0;
        foreach($jsonArr as &$entry)
        {
            $i++;
            $rating = rand(0, 100) * .01;

            $entry['id'] = $i;
            $entry['rating'] = round($rating, 2);
        }

        return response()->json($jsonArr, 200);
    }
}
