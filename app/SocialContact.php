<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialContact extends Model
{
    public $fillable = ['name', 'link', 'description'];
}
