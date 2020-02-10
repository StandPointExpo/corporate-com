<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public $timestamps = false;

    public $fillable = ['name', 'address', 'email', 'phone'];

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeDefaultMail(Builder $query)
    {
        return $query->where('name', 'standpoint.com.ua');
    }

    /**
     * @return mixed
     */
    public static function getNumber()
    {
        return Contact::first()->phone;
    }
}
