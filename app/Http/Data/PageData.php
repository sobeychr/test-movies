<?php

namespace App\Http\Data;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PageData extends Model
{
    use SoftDeletes;

    const CREATED_AT = 'created';
    const DELETED_AT = 'deleted';
    const UPDATED_AT = 'updated';

    public $timestamps = false;

    //protected $connection = 'mysql';
    protected $dateFormat = 'U';
    protected $primaryKey = 'id';
    protected $route = '';

    public function isDeleted():bool
    {
        return $this->attributes['deleted'] !== null
            && $this->attributes['deleted'] > 0
            && $this->attributes['deleted'] < NOW;
    }

    public function getRoute():string
    {
        $name = preg_replace('/[^a-z]+/', '-', strtolower($this->name));
        return '/' . $this->route . '/' . $this->id . '/' . $name;
    }

    protected function isInTimeFrame(int $timestamp, string $start, string $end):bool
    {
        $st = strtotime($start, $timestamp);
        $et = strtotime($end,   $timestamp);
        return $st <= NOW && NOW <= $et;
    }
}
