<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    public $timestamps = false;

    public $fillable = ['name', 'link'];

    /**
     * @return string|string[]|null
     */
    public function getFreeLinkAttribute()
    {
        return  preg_replace('#^https?://#', '', $this->link);
    }
}
