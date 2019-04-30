<?php

namespace App\Component;

class RateGraph
{
    protected $avg = 0;
    protected $count = 0;
    protected $rates = [];

    //protected $columns = [];
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

    /*
    public function getColumns():array
    {
        if(count($this->columns) === 0 && !$this->isEmpty()) {

            $lastDay = '';
            $dayArr  = [];
            foreach($this->getRates() as $date=>$rate)
            {
                $dayStr = date('m-d-H', $date);

                if($dayStr === $lastDay) {
                    $dayArr[] = $rate;
                }
                else {
                    $lastDay = $dayStr;

                    if(!empty($dayArr)) {
                        $this->columns[$dayStr] = round(array_sum($dayArr) / count($dayArr), 2);
                    }
                }
            }
           
            foreach($this->getRates() as $date=>$rate)
            {
                //$this->columns[ date('m-d-H-i', $date) ] = $rate;
            }
        }

        return $this->columns;
    }
    */
   
    public function getRows():array
    {
        if(empty($this->rows) && !$this->isEmpty()) {
            for($i=0; $i<=10; $i++)
            {
                $this->rows[$i] = 0;
            }

            foreach($this->rates as $rate)
            {
                $row = floor($rate * .1);
                $this->rows[$row]++;
            }
        }

        return $this->rows;
    }
}
