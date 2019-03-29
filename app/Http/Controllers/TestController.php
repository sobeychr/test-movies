<?php

namespace App\Http\Controllers;

use App\Http\Data\MovieData;
use App\Http\Data\UserData;
use Laravel\Lumen\Routing\Controller as BaseController;

class TestController extends BaseController
{
    protected const DB = 'test-movies';
    protected const TABLES = [
        'anticipation' => [
            'name' => 'anticipation',
            'fields' => ['movie','user','date','want'],
        ],
        'movie' => [
            'name' => 'movie',
            'fields' => [
                'name','created','updated',
                'release','deleted','boxoffice',
                'trailer1','trailer2','trailer3',
            ],
        ],
        'rating' => [
            'name' => 'rating',
            'fields' => ['movie','user','rate','date'],
        ],
        'user' => [
            'name' => 'user',
            'fields' => [
                'name','gender','email',
                'created','updated','deleted',
            ],
        ],
    ];

    protected const BOXES = [
        '?id=avengers11.htm',
        '?id=marvel0518.htm',
        '?id=alita.htm',
        '?id=shawshankredemption.htm',
        '?id=mist.htm',
        '?id=shining.htm',
        '?id=aladdin.htm',
    ];

    protected const DAY   = 60*60*24;
    protected const START = '2017-01-01';
    protected const END   = '2020-12-31';

    protected const EMAIL = ['@hotmail.com','@msn.ca','@gmail.com','@yahoo.ca'];

    protected const TRAILERS = ['8Nwj29zCxzI', 's9NIBZfVBW4', 'r5EXKDlf44M', 'PMl3i9WHmV4', 'Pxj6mjhmIjA', 'qHK5MC7yzf4', '_LE3ePdFXUw', 'TQkvAlP8fz8', '2jC5WAJzp34', 'vbqLfN092qw'];

    protected const TEXT = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus mauris tortor, tristique vitae aliquet at, posuere ac erat. Suspendisse potenti. Sed vestibulum consectetur eros, ac tempor justo laoreet tincidunt. Proin sit amet erat et quam consequat bibendum. Duis maximus pretium magna, id ullamcorper justo porttitor quis. Phasellus vel condimentum libero, sed varius elit. Fusce sed malesuada ante. Etiam ut nisi commodo, condimentum mi sit amet, lobortis felis. Praesent sollicitudin eleifend nulla at posuere. Proin nec enim ut turpis luctus egestas sit amet cursus leo. Donec posuere erat mauris, in elementum diam ullamcorper sed. Pellentesque at luctus diam. Mauris in leo ac mauris rutrum egestas eu nec massa. Vivamus interdum congue lacinia. Vivamus sodales convallis viverra. Ut ut tortor nec risus porttitor facilisis. Vestibulum aliquam condimentum nibh volutpat malesuada. Aenean maximus ipsum imperdiet tristique commodo. Mauris sodales magna ante, sollicitudin vestibulum turpis mollis eu. Nunc molestie aliquam ligula, ut ultrices sapien aliquet at. Etiam pharetra leo in est ultrices, id sollicitudin quam venenatis. In a hendrerit justo, sit amet euismod elit. Nunc blandit luctus erat a sodales. Nam sed tempus nulla, ultricies vestibulum purus. Integer vulputate, ligula at mattis finibus, nisi eros tristique dolor, fringilla condimentum dolor turpis in odio. Integer sed pharetra neque. Aenean quis commodo leo. In at risus lorem. Pellentesque non lorem sed magna laoreet venenatis. Suspendisse purus ligula, cursus dapibus nulla at, suscipit rhoncus justo. Suspendisse eu est dignissim, vulputate orci sit amet, iaculis dui. Nulla id eros a massa eleifend tempor in eu justo. Mauris vel fringilla metus. Integer augue leo, vehicula et faucibus pretium, sagittis a odio. Nam vel lobortis mauris. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eget libero nec arcu condimentum porta. Vivamus quis lectus commodo orci iaculis facilisis. Donec varius mauris nec congue dapibus. Duis tempus risus ultricies tempor sollicitudin. Phasellus placerat, massa sed pharetra congue, magna odio facilisis ex, molestie facilisis dui enim non justo. Nunc mollis nulla a orci mattis, eget lacinia enim faucibus. Pellentesque consectetur quam eu sapien mattis lacinia. Maecenas massa nunc, egestas sit amet lacinia ut, venenatis sit amet lacus. In eros ante, posuere quis arcu ut, vehicula placerat ligula. Aenean non sapien eget nibh fermentum pharetra. Vestibulum at nisi velit. Ut faucibus semper metus, vitae finibus mi pulvinar at. Quisque aliquet turpis vitae condimentum scelerisque. Proin et diam tincidunt, finibus quam sed, imperdiet eros. Suspendisse sed venenatis erat. Morbi quis mi id nunc volutpat tincidunt. Aliquam euismod orci eget luctus interdum. Cras tincidunt lectus quis sem vehicula, at auctor nulla tempor. Morbi vel neque eros. Nulla auctor nibh id dolor tempus facilisis. Sed tincidunt tellus vel erat auctor iaculis. Duis tristique consectetur ipsum in venenatis. Aenean gravida quis ante ac scelerisque. Duis mauris dolor, elementum at ligula id, pellentesque bibendum leo. In ultrices risus congue enim aliquam, in ullamcorper turpis interdum.';

    public function generateAnticipations():string
    {
        $now = strtotime('2019-03-28 00:00:00');

        $users = UserData::all();
        $movies = MovieData::all();

        $entries = [];
        foreach($movies as $movie)
        {
            $end   = $movie->release;
            $start = strtotime('-3 weeks', $end);

            if($end < $now)
            {
                $amountRates = rand(30, 250);
                $raters = $users->random($amountRates);

                foreach($raters as $rater)
                {
                    $want = rand(0, 1);

                    $entries[] = [
                        'movie' => $movie->id,
                        'user'  => $rater->id,
                        'date'  => rand($start, $end),
                        'want'  => $want,
                    ];
                }
            }
        }

        return '<pre>' . $this->exportTable('anticipation', $entries) . '</pre>';
    }

    public function generateMovies():string
    {
        $total = 120;
        $entries = [];

        for($i=0; $i<$total; $i++)
        {
            $add = $this->getDate();
            $release = $this->getDate(true, $add);
            $trailers = $this->getMovieTrailers();

            $entries[] = array_merge([
                'name' => $this->getName(),
                'created'  => $add,
                'updated'  => $add,
                'release' => $release,
                'boxoffice' => $this->getBox(),
            ], $trailers);
        }

        return '<pre>' . $this->exportTable('movie', $entries) . '</pre>';
    }

    public function generateRates():string
    {
        $now = strtotime('2019-03-28 00:00:00');

        $users = UserData::all();
        $movies = MovieData::all();

        $entries = [];
        foreach($movies as $movie)
        {
            $start = $movie->release;
            $end   = strtotime('+2 weeks', $start);

            if($end < $now)
            {
                $amountRates = rand(30, 250);
                $raters = $users->random($amountRates);

                foreach($raters as $rater)
                {
                    $rate = rand(0, 20) * .5 * 10;

                    $entries[] = [
                        'movie' => $movie->id,
                        'user'  => $rater->id,
                        'rate'  => $rate,
                        'date'  => rand($start, $end),
                    ];
                }
            }
        }

        return '<pre>' . $this->exportTable('rating', $entries) . '</pre>';
    }

    public function generateUsers():string
    {
        $total = 750;
        $entries = [];

        for($i=0; $i<$total; $i++)
        {
            $date = $this->getDate();
            $entries[] = [
                'name'    => $this->getName(20),
                'gender'  => rand(0,1),
                'email'   => $this->getEmail(),
                'created' => $date,
                'updated' => $date,
            ];
        }

        return '<pre>' . $this->exportTable('user', $entries) . '</pre>';
    }

    protected function getBox():string
    {
        return self::BOXES[ array_rand(self::BOXES) ];
    }

    protected function getDate(bool $time=false, int $start=-1):int
    {
        if($start < 0) {
            $start = strtotime(self::START);
        }
        $end   = strtotime(self::END);
        $now   = rand($start, $end);
        return $time ? $this->roundDay($now) : $now;
    }

    protected function getEmail():string
    {
        $ext = self::EMAIL[ array_rand(self::EMAIL) ];
        $namelen = 32 - strlen($ext);
        $name = $this->getName($namelen);
        $name = strtolower($name);
        $name = preg_replace('/[^a-z]+/', '.', $name);
        return $name . $ext;
    }

    protected function getMovieTrailers():array
    {
        $total = 3;
        $list  = [];
        $amount = rand(1, 3);
        for($i=1; $i<=$total; $i++)
        {
            $list['trailer' . $i] = $i <= $amount
                ? self::TRAILERS[ array_rand(self::TRAILERS) ]
                : '';
        }
        return $list;
    }

    protected function getName(int $len=32):string
    {
        static $g_getName=-1;
        if($g_getName < 0) {
            $g_getName = strlen(self::TEXT);
        }
        $length = rand(3, $len);
        $start  = rand(0, $g_getName - $length);
        return substr(self::TEXT, $start, $length);
    }

    protected function exportEntry(array $entry):string
    {
        $arr = [];
        foreach($entry as $value)
        {
            if(is_string($value)) {
                $arr[] = '"' . $value . '"';
            }
            else {
                $arr[] = $value;
            }
        }

        return '(' . implode(',', $arr) . ')';
    }

    protected function exportTable(string $tablekey, array $entries):string
    {
        $table = self::TABLES[$tablekey];
        $values = [];
        //$values = array_map([$this, 'exportEntry'], $entries);
        foreach($entries as $entry)
        {
            $v = [];
            foreach($table['fields'] as $field)
            {
                $val = $entry[$field] ?? NULL;

                if(is_string($val)) {
                    $val = '"' . $val . '"';
                }
                elseif($val === NULL) {
                    $val = 'NULL';
                }

                $v[$field] = $val;
            }
            $values[] = '(' . implode(',', array_values($v)) . ')';
        }

        $query = 'INSERT INTO `' . self::DB . '`.`' . $table['name'] . '`';
        $query .= "\n(`" . implode('`,`', $table['fields']) . '`)';
        $query .= "\n VALUES\n";
        $query .= implode(",\n", $values);
        $query .= "\n;";

        return $query;
    }

    protected function roundDay(int $timestamp):int
    {
        $prev = $timestamp - $timestamp % self::DAY;
        return $prev + self::DAY;
    }
}
