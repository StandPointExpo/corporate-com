<?php

namespace App;

use App\Helpers\ImageHelper;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    const DEFAULT_MAIN_IMAGE        = 'default/img/no-image.jpeg';
    const PAGINATE_COUNT            = 10;
    const DEFAULT_PORTFOLIOS_NUMBER = 12;

    public $fillable = ['title', 'description', 'active', 'client', 'is_front'];

    public $appends = [
        'main_image',
        'main_image_id',
        'main_image_name',
        'main_image_preview',
        'main_image_thumb',
        'main_image_large'
    ];

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
     * @return int
     */
    public function getMainImageIdAttribute()
    {
        return $this->images()->count()
            ? optional($this->images()->mainImage())->first()->id ?? $this->images()->first()->id
            : null;
    }

    /**
     * @return string
     */
    public function getMainImageNameAttribute()
    {
        return $this->images()->count()
            ? ImageHelper::nameFromUrl($this->images()->first()->file)
            : null;
    }

    /**
     * @return string
     */
    public function getMainImagePreviewAttribute()
    {
        return route('image_preview', [$this->id, \ImageHelper::nameFromUrl($this->main_image)]);
//        return route('imagecache', ['portfolio_medium', $this->main_image]);
    }

    /**
     * @return string
     */
    public function getMainImageLargeAttribute()
    {
        return url('/') . $this->main_image;
//        return route('imagecache', ['portfolio_large', $this->main_image]);
    }

    /**
     * @return mixed|string
     */
    public function getMainImageThumbAttribute()
    {
        if(!is_null($previewFile = optional(optional($this->images()->mainImage())->first())->preview_file)) {
            return asset($previewFile);
        }
        return $this->main_image_preview;
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

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeActive(Builder $query)
    {
        return $query->where('active', true);
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeIsFront(Builder $query)
    {
        return $query->where('is_front', true);
    }
}
