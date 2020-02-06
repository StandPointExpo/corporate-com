<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use App\Language;
use App\Article;

class Page extends Model
{

    public $timestamps = false;

    public $fillable = ['name', 'description', 'language_id', 'site_title'];

    protected $with = ['language', 'articles'];

    const PAGE_PORTFOLIO    = 'portfolio-page';
    const PAGE_CONTACT      = 'contact-page';
    const PAGE_MAIN         = 'main-page';

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

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeMainPage(Builder $query)
    {
        return $query->where('name', self::PAGE_MAIN)
            ->whereHas('language', function ($query){
                $query->where('name', app()->getLocale());
            });
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeContactPage(Builder $query)
    {
        return $query->where('name', self::PAGE_CONTACT)
            ->whereHas('language', function ($query) {
                $query->where('name', app()->getLocale());
            });
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopePortfolioPage(Builder $query)
    {
        return $query->where('name', self::PAGE_PORTFOLIO)
            ->whereHas('language', function ($query) {
                $query->where('name', app()->getLocale());
            });
    }
}
