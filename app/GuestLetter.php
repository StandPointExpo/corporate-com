<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuestLetter extends Model
{
    const PAGINATE_COUNT = 10;

    public $fillable = ['subject', 'name', 'email', 'message'];
}
