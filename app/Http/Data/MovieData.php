<?php

namespace App\Http\Data;

use Illuminate\Database\Eloquent\Model;

class MovieData extends Model
{
    const CREATED_AT = 'add';
    const DATE_STR = 'Y-m-d H:i:s';

    public $timestamps = false;

    protected $connection = 'mysql';
    protected $dateFormat = 'U';
    protected $table = 'movie';
    /*
    public function getName():string { return $this->attributes['name']; }
    public function getAdd(bool $asDateStr)
    {
        if($asDateStr) {
            return date(DATE_STR, $this->attributes['add']);
        }
        return $this->attributes['add'];
    }
    */
}
