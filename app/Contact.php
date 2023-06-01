<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Contact extends Model
{
    public $timestamps = false;
    public $fillable    = ['name', 'address', 'email', 'phone', 'language_id'];
    public $appends     = ['coordinates'];
    public function getCoordinatesAttribute()
    {

    }

    public function language(): HasOne
    {
        return $this->hasOne(Language::class, 'id', 'language_id');
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
