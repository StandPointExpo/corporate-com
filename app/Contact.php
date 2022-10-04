<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public $timestamps = false;

    public $fillable    = ['name', 'address', 'email', 'phone'];

    public $appends     = ['coordinates'];

    public function getCoordinatesAttribute()
    {

    }

    /**
     * @return mixed
     */
    public static function getNumber()
    {
        return optional(Contact::first())->phone;
    }

    /**
     * @return mixed
     */
    public function phones()
    {
        return $this->hasMany(ContactPhone::class, 'contact_id');
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeDefaultMail(Builder $query)
    {
        return $query->where('name', 'standpoint-expo.com');
    }
}
