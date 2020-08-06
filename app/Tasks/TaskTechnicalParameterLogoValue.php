<?php

namespace App\Tasks;

use Illuminate\Database\Eloquent\Model;

class TaskTechnicalParameterLogoValue extends Model
{
    public $timestamps  = false;

    protected $fillable = ['id', 'value'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function technicalParameters()
    {
        return $this->belongsToMany(
            TaskTechnicalParameter::class, 'task_technical_parameter_task_technical_parameter_logo_value'
        );
    }
}
