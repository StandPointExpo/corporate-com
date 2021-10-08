<?php

namespace App\Tasks;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class TaskConstructionParameter extends Model
{
    protected $fillable = [
        'task_id',
        'height_stand',
        'double_decker_stand',
        'double_decker_notes',
        'suspension_structure',
        'suspension_notes',
        'floor',
        'floor_notes',
        'walls_notes',
        'utility_room',
        'utility_room_notes',
        'negotiation_area_notes',
        'additional_info',
    ];

    /**
     * @return HasMany
     */
    public function walls(): HasMany
    {
        return $this->hasMany(TaskConstructionParameterWall::class, 'construction_id', 'id');
    }

    /**
     * @return BelongsToMany
     */
    public function negotiationAreas(): BelongsToMany
    {
        return $this->belongsToMany(
            TaskConstructionParameterNegotiationAreaValue::class, 'task_construction_parameter_tcp_negotiation_area_value',
            'task_construction_parameter_id', 'tcp_negotiation_area_value_id'
        );
    }

    /**
     * @return BelongsTo
     */
    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }

    /**
     * @return MorphMany
     */
    public function comments(): MorphMany
    {
        return $this->morphMany(TaskComment::class, 'commentable')->orderBy('created_at', 'desc');
    }
}
