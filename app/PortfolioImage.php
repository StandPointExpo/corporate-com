<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use App\Portfolio;

class PortfolioImage extends Model
{
    public $fillable = ['portfolio_id', 'file', 'title', 'description', 'active', 'is_main'];

    public $appends = ['large_image', 'large_url', 'preview_url'];

//    public function getAdminPreviewUrlAttribute()
//    {
//        return route('imagecache', ['portfolio_medium', $this->file]);
//    }

//    public function getAdminLargeUrlAttribute()
//    {
//        return route('imagecache', ['portfolio_large', $this->file]);
//    }

    public function getLargeUrlAttribute()
    {
        return route('imagecache', ['portfolio_large', $this->file]);
    }

    public function getLargeImageAttribute()
    {
        return route('imagecache', ['portfolio_large', $this->file]);
    }

    public function getPreviewUrlAttribute()
    {
        return route('imagecache', ['portfolio_medium', $this->file]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class);
    }

    public function scopeMainImage(Builder $query)
    {
        return $query->where('is_main', true);
    }
}
