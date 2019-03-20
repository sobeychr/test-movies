<?php

namespace App\Http\Data;

class MovieData extends PageData
{
    /*
    protected $data = [];
    protected $name = '';
    protected $nameRoute = '';
    protected $id = 0;
    protected $route = '';
    */
    
    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->name = $this->data['name'];
        $this->nameRoute = str_replace(' ', '-', $this->data['name']);

        $this->route = '/movie/' . $this->id . '/' . $this->nameRoute;
    }
}
