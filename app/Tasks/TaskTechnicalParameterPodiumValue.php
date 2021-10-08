<?php

namespace App\Tasks;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class TaskTechnicalParameterPodiumValue extends Model
{
    public $timestamps  = false;

    protected $fillable = ['id', 'value'];

    /**
     * @return BelongsToMany
     */
    public function technicalParameters()
    {
        return $this->belongsToMany(
            TaskTechnicalParameter::class, 'task_technical_parameter_task_technical_parameter_podium_value'
        );
    }
}
