<?php

namespace App\Http\Data;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MovieData extends Model
{
    use SoftDeletes;

    const CREATED_AT = 'created';
    const DELETED_AT = 'deleted';
    const UPDATED_AT = 'updated';

    // Anticipate from 3 weeks prior of release to release day
    private const ANTICIPATION_START = '-3 weeks';
    private const ANTICIPATION_END   = 'now';
    // Rate from release day up to 2 weeks after release
    private const RATE_START = 'now';
    private const RATE_END   = '+2 weeks';

    public $timestamps = false;

    //protected $connection = 'mysql';
    protected $dateFormat = 'U';
    protected $primaryKey = 'id';
    protected $table = 'movie';

    protected $attributes = [
        /*
        'id'   => 0,
        'name' => string,
        'created' => timestamp,
        'updated' => timestamp,
        'release' => timestamp rounded to day,
        'deleted' => timestamp OR 0,
        'boxoffice' => string link
        'trailer1' => string YouTube ID,
        'trailer2' => string YouTube ID,
        'trailer3' => string YouTube ID,
        */
    ];

    public function isDeleted():bool
    {
        return $this->attributes['deleted'] > 0
            && $this->attributes['deleted'] < NOW;
    }

    public function hasAnticipation():bool
    {
        return !$this->isDeleted()
            && $this->isInTimeFrame(
                self::ANTICIPATION_START,
                self::ANTICIPATION_END
            );
    }

    public function hasRate():bool
    {
        return !$this->isDeleted()
            && $this->isInTimeFrame(
                self::RATE_START,
                self::RATE_END
            );
    }

    protected function isInTimeFrame(string $start, string $end):bool
    {
        $ts = $this->attributes['release'];
        $st = strtotime($start, $ts);
        $et = strtotime($end,   $ts);
        return $st <= NOW && NOW <= $et;
    }
}
/*
<a href='{{$entry->route}}'>
    <span class='id'>{{$entry->id}}</span>
    <span class='name'>{{$entry->name}}</span>
    <span class='release'>{{$entry->releaseString}}</span>
</a>
*/