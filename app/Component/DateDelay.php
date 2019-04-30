<?php

namespace App\Component;

class DateDelay
{
    const CONFIG = [
        [
            'class' => 'over',
            'label' => 'Time is up!',
            'time'  => 0,
        ],
        [
            'class' => 'very-short',
            'label' => 'Less than 15 mins',
            'time'  => 60 * 60 * .25,
        ],
        [
            'class' => 'very-short',
            'label' => 'Less than 30 mins',
            'time'  => 60 * 60 * .5,
        ],
        [
            'class' => 'short',
            'label' => 'Less than 1 hour',
            'time'  => 60 * 60,
        ],
        [
            'cut'   => 'hour',
            'class' => 'medium',
            'label' => 'Less than {{replace}} hours',
            'time'  => 60 * 60 * 24,
        ],
        [
            'cut'   => 'day',
            'class' => 'long',
            'label' => 'About {{replace}} days',
            'time'  => 60 * 60 * 24 * 14,
        ],
    ];

    static public function getMaxDelay():int
    {
        static $g_getMaxDelay = 0;
        
        if(!$g_getMaxDelay) {
            $config = self::CONFIG;
            $config = end($config);
            $g_getMaxDelay = $config['time'];
        }

        return $g_getMaxDelay;
    }

    static public function isBeforeDelay(int $timestamp):bool
    {
        return $timestamp < self::getMaxDelay();
    }

    protected $class = '';
    protected $cut   = '';
    protected $label = '';
    protected $time  = 0;

    protected $delay = 0;
    protected $timestamp = 0;

    public function __construct(int $timestamp)
    {
        $this->timestamp = $timestamp;
        $this->delay = $timestamp - NOW;

        foreach(self::CONFIG as $entry)
        {
            extract($entry);
            if($this->delay < $time) {
                $this->class = $class;
                $this->label = $label;
                $this->time  = $time;

                if(isset($cut)) {
                    $this->cut = $cut;
                }
                break;
            }
        }
    }

    public function getClass():string { return $this->class; }
    public function getCut():string   { return $this->cut;   }
    public function getDelay():int    { return $this->delay; }
    public function getTime():int     { return $this->time;  }
    public function gettimestamp():int{ return $this->timestamp; }

    public function getLabel():string
    {
        return str_replace('{{replace}}', $this->cut, $this->label);
    }

    public function getTemplate():array
    {
        return [
            $this->getClass(),
            $this->getLabel(),
        ];
    }
}
