<?php

namespace App\Http\Data;

class MovieData extends PageData
{
    // Anticipate from 3 weeks prior of release to release day
    private const ANTICIPATION_START = '-3 weeks';
    private const ANTICIPATION_END   = 'now';
    // Rate from release day up to 2 weeks after release
    private const RATE_START = 'now';
    private const RATE_END   = '+2 weeks';

    protected $route = 'movie';
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

    protected $trailers = false;

    public function getTrailers():array
    {
        if(!is_array($this->trailers)) {

            $this->trailers = [];

            for($i=1; $i<=3; $i++)
            {
                $e = 'trailer' . $i;
                if($this->$e) {
                    $this->trailers[] = $this->$e;
                }
            }
        }

        return $this->trailers;
    }

    public function hasAnticipation():bool
    {
        return !$this->isDeleted()
            && $this->isInTimeFrame(
                $this->attributes['release'],
                self::ANTICIPATION_START,
                self::ANTICIPATION_END
            );
    }

    public function hasRate():bool
    {
        return !$this->isDeleted()
            && $this->isInTimeFrame(
                $this->attributes['release'],
                self::RATE_START,
                self::RATE_END
            );
    }
}
