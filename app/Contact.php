<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public $timestamps = false;

    public $fillable = ['name', 'address', 'email', 'phone'];

    public function scopeDefaultMail(Builder $query)
    {
        return $query->where('name', 'standpoint.com.ua');
    }
}
