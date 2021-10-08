<?php

namespace App\Tasks;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class TaskTechnicalParameter extends Model
{
    protected $fillable = [
        'task_id',
        'lighting_notes',
        'storefronts_notes',
        'podium_notes',
        'reception_desk',
        'reception_desk_notes',
        'logo_notes',
        'multimedia_notes',
        'furnishings_room',
        'furnishings_notes',
        'devices',
        'additional_info'
    ];

    /**
     * @return HasMany
     */
    public function lightings()
    {
        return $this->hasMany(TaskTechnicalLighting::class, 'technical_parameters_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function storefronts()
    {
        return $this->hasMany(TaskTechnicalStorefront::class, 'technical_parameters_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function multimedia()
    {
        return $this->hasMany(TaskTechnicalMultimedia::class, 'technical_parameters_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function furnishings()
    {
        return $this->hasMany(TaskTechnicalFurnishing::class, 'technical_parameters_id', 'id');
    }

    /**
     * @return BelongsToMany
     */
    public function logos(): BelongsToMany
    {
        return $this->belongsToMany(
            TaskTechnicalParameterLogoValue::class, 'task_technical_parameter_task_technical_parameter_logo_value'
        );
    }

    /**
     * @return BelongsToMany
     */
    public function podiums(): BelongsToMany
    {
        return $this->belongsToMany(
            TaskTechnicalParameterPodiumValue::class, 'task_technical_parameter_task_technical_parameter_podium_value'
        );
    }

//    public function logoFiles() //todo
//    {
//        return $this->hasManyThrough(File::class, Task::class, 'id', 'project_id', 'task_id', 'project_id');
//    }

//    public function deviceFiles() //todo
//    {
//        return $this->hasManyThrough(File::class, Task::class, 'id', 'project_id', 'task_id', 'project_id');
//    }

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
