<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuestLetter extends Model
{
    public $fillable = ['subject', 'name', 'email', 'message'];
}
