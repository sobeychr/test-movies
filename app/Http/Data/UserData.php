<?php

namespace App\Http\Data;

class UserData extends PageData
{
    protected $direct = ['email', 'rating', 'total'];

    /*
    protected $data = [];
    protected $name = '';
    protected $nameRoute = '';
    protected $id = 0;
    protected $route = '';
    */
    
    protected $email = '';

    protected $first = '';
    protected $last  = '';
    protected $title = '';

    protected $rating = 0;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->first = $this->data['name']['first'] ?? '';
        $this->last  = $this->data['name']['last']  ?? '';
        $this->title = $this->data['name']['title'] ?? '';

        $this->name = $this->title . ' ' . $this->first . ' ' . $this->last;
        $this->nameRoute = $this->first . '-' . $this->last;

        $this->route = '/user/' . $this->id . '/' . $this->nameRoute;
    }
}
