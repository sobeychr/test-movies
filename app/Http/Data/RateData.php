<?php

namespace App\Http\Data;

use Illuminate\Database\Eloquent\Model;

class RateData extends Model
{
    //protected $connection = 'mysql';
    protected $dateFormat = 'U';
    protected $primaryKey = 'id';

    protected $table = 'rating';

    protected $attributes = [
        /*
        'id'   => 0,
        'movie' => 0,
        'user' => 0,
        'rate' => 0,
        'date' => timestamp,
        */
    ];
}
