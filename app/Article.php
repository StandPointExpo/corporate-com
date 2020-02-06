<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use App\Language;
use App\Page;

class Article extends Model
{

    const TEXT_SECOND  = 'second-text';
    const TEXT_FOURTH  = 'fourth-text';
    const TEXT_FIRST   = 'first-text';
    const TEXT_THIRD   = 'third-text';
    const TEXT_FIFTH   = 'fifth-text';

    public $timestamps = false;

    public $fillable = ['page_id', 'language_id', 'name', 'text'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function language()
    {
        return $this->hasOne(Language::class);
    }

    public function scopeEnglish(Builder $query)
    {
        return $query->whereHas('language', function ($q) {
           $q->where('name', Language::ENGLISH);
        });
    }

    public function scopeRussian(Builder $query)
    {
        return $query->whereHas('language', function ($q) {
            $q->where('name', Language::RUSSIAN);
        });
    }

    public function scopeUkrainian(Builder $query)
    {
        return $query->whereHas('language', function ($q) {
            $q->where('name', Language::UKRAINE);
        });
    }
}
