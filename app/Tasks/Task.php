<?php

namespace App\Tasks;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;

    const DEFAULT_STATUS = 'Expecting';

    protected $fillable = [ 'user_id', 'status', 'publication' ];

    /**
     * @return HasOne
     */
    public function areaParameter(): HasOne
    {
        return $this->hasOne(TaskAreaParameter::class)->withDefault();
    }

    /**
     * @return HasOne
     */
    public function constructionParameter(): HasOne
    {
        return $this->hasOne(TaskConstructionParameter::class)->withDefault();
    }

    /**
     * @return HasOne
     */
    public function technicalParameter(): HasOne
    {
        return $this->hasOne(TaskTechnicalParameter::class)->withDefault();
    }

    /**
     * @return HasOne
     */
    public function designWish(): HasOne
    {
        return $this->hasOne(TaskDesignWish::class)->withDefault();
    }

    /**
     * @return MorphMany
     */
        public function comments(): MorphMany
    {
        return $this->morphMany(TaskComment::class, 'commentable')->orderBy('created_at', 'asc');
    }

    public function scopePublished(Builder $query)
    {
        return $query->where('publication', true);
    }
}
