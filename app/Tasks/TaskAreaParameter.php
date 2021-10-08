<?php

namespace App\Tasks;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class TaskAreaParameter extends Model
{
    protected $fillable = [
        'task_id',
        'aspect_ratio_a',
        'aspect_ratio_b',
        'aspect_ratio_h',
        'configuration',
        'area_info'
    ];

//    public function files() //todo belongsToMany pivot or morphMany
//    {
//        return $this->belongsTo(TaskFile::class);
//    }

    /**
     * @return MorphMany
     */
    public function comments(): MorphMany
    {
        return $this->morphMany(TaskComment::class, 'commentable')->orderBy('created_at', 'desc');
    }

    /**
     * @return BelongsTo
     */
    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }
}
