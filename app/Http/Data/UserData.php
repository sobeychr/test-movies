<?php

namespace App\Http\Data;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserData extends Model
{
    use SoftDeletes;

    const CREATED_AT = 'created';
    const DELETED_AT = 'deleted';
    const UPDATED_AT = 'updated';

    public $timestamps = false;

    //protected $connection = 'mysql';
    protected $dateFormat = 'U';
    protected $primaryKey = 'id';
    protected $table = 'user';

    protected $attributes = [
        /*
        'id'   => 0,
        'name' => string,
        'gender' => bool,
        'email'  => string,
        'created' => timestamp,
        'updated' => timestamp,
        'deleted' => timestamp
        */
    ];

    public function isDeleted():bool
    {
        return $this->attributes['deleted'] > 0
            && $this->attributes['deleted'] < NOW;
    }
}

/*
<a href='{{$entry->route}}'>
    <span class='id'>{{$entry->id}}</span>
    <span class='name'>{{$entry->name}}</span>
</a>
*/