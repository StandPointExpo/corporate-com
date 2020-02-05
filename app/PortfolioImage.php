<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Portfolio;

class PortfolioImage extends Model
{
    public $fillable = ['portfolio_id', 'file', 'title', 'description', 'active', 'is_main'];


    public function getAdminPreviewUrlAttribute()
    {
        return route('imagecache', ['portfolio_medium', $this->file]);
    }

    public function getAdminLargeUrlAttribute()
    {
        return route('imagecache', ['large', $this->file]);
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
        return $this->where('is_main', true);
    }
}
