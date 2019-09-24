<?php

namespace App\Component;

class RateGraph
{
    const MIN = 0;
    const MAX = 10;

    const ROWS = [
        'bad' => [0,1,2],
        'low' => [3,4,5],
        'medium' => [6,7,8],
        'high' => [9,10],
    ];

    static public function getRowClass(int $row):string
    {
        foreach(self::ROWS as $class=>$list)
        {
            if(in_array($row, $list)) {
                return $class;
            }
        }
        return '';
    }

    protected $avg = 0;
    protected $count = 0;
    protected $rates = [];

    protected $rows = [];

    public function __construct(array $rates)
    {
        $this->rates = $rates;
        $this->count = count($rates);
        $this->avg   = $this->count > 0
            ? round(array_sum($this->rates) / $this->count, 2)
            : 0;
    }

    public function isEmpty():bool { return $this->count === 0; }

    public function getAvg():float   { return $this->avg;   }
    public function getCount():int   { return $this->count; }
    public function getRates():array { return $this->rates; }
   
    public function getRows():array
    {
        if(empty($this->rows) && !$this->isEmpty()) {
            $this->rows  = array_fill(self::MIN, self::MAX + 1, 0);

            foreach($this->rates as $rate)
            {
                $row = floor($rate * .1);
                $this->rows[$row]++;
            }
        }

        return $this->rows;
    }
}
