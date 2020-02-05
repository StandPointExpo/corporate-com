<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    const DEFAULT_MAIN_IMAGE = 'default/img/no-image.jpeg';

    public $fillable = ['title', 'description', 'active', 'client'];

    public $appends = ['main_image'];

    protected $with = ['images'];

    /**
     * @return mixed
     */
    public function getMainImageAttribute()
    {
        return $this->images()->count()
            ? optional($this->images()->mainImage())->first()->file ?? $this->images()->first()->file
            : \Storage::url(self::DEFAULT_MAIN_IMAGE);
    }

    /**
     * @return string
     */
    public function getAdminMainImageUrlAttribute()
    {
        return route('imagecache', ['small', $this->main_image]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(PortfolioImage::class);
    }
}
