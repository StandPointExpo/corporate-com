<?php

namespace App;

use App\Helpers\ImageHelper;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class PortfolioImage extends Model
{
    public $fillable = ['portfolio_id', 'file', 'title', 'description', 'active', 'is_main', 'preview_file'];

    public $appends = ['large_image', 'large_url', 'preview_url'];

    public function getAdminPreviewUrlAttribute()
    {
        return route('imagecache', ['portfolio_medium', $this->file]);
    }

//    public function getAdminLargeUrlAttribute()
//    {
//        return route('imagecache', ['portfolio_large', $this->file]);
//    }

    public function getLargeUrlAttribute()
    {
        return url('/') . $this->file;
//        return route('imagecache', ['portfolio_large', $this->file]);
    }

    public function getLargeImageAttribute()
    {
        return route('imagecache', ['portfolio_large', $this->file]);
    }

    public function getPreviewUrlAttribute()
    {
        return url('/') . ImageHelper::filePreviewUrl($this->file);
//        return route('imagecache', ['portfolio_medium', $this->file]);
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
        return $query->where('is_main', '=', 1);
    }
}
