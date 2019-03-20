<?php

namespace App\Http\Data;

class UserData extends PageData
{
    protected $email = '';

    protected $first = '';
    protected $last  = '';
    protected $title = '';

    protected $rating = 0;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->email = $this->data['email'] ?? '';

        $this->first = $this->data['name']['first'] ?? '';
        $this->last  = $this->data['name']['last']  ?? '';
        $this->title = $this->data['name']['title'] ?? '';

        $this->name = $this->first . '-' . $this->last;

        $this->rating = $this->data['rating'];
        $this->total  = $this->data['total'];

        $this->route = '/user/' . $this->id . '/' . $this->name;
    }
}