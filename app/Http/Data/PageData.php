<?php

namespace App\Http\Data;

abstract class PageData
{
    protected $data = [];
    protected $name = '';
    protected $nameRoute = '';
    protected $id = 0;
    protected $route = '';

    public function __construct(array $data)
    {
        $this->data = $data;
        $this->id = $this->data['id'] ?? 0;
    }

    public function __get($prop) {
        if(property_exists($this, $prop)) {
            return $this->$prop;
        }
        return null;
    }
}
