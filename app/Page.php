<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Language;
use App\Article;

class Page extends Model
{

    public $timestamps = false;

    public $fillable = ['name', 'description', 'language_id'];

    protected $with = ['language', 'articles'];

    /**
     * @return string
     */
    public function getLanguageNameAttribute()
    {
        switch ($this->language()->first()->name) {
            case Language::ENGLISH:
                return Language::ENG_FULL;
                break;
            case Language::UKRAINE:
                return Language::UA_FULL;
                break;
            case Language::RUSSIAN:
                return Language::RU_FULL;
                break;
        }

    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}
