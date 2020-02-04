<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    public $timestamps = false;

    public $fillable = ['name'];

    const ENGLISH  = 'en';
    const UKRAINE  = 'ua';
    const RUSSIAN  = 'ru';
}
