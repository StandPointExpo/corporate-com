<?php

namespace App\Tasks;

use Illuminate\Database\Eloquent\Model;

class TaskConstructionParameterNegotiationAreaValue extends Model
{
    public $timestamps  = false;

    protected $fillable = ['id', 'value'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function constructionParameters()
    {
        return $this->belongsToMany(
            TaskConstructionParameter::class, 'task_construction_parameter_tcp_negotiation_area_value',
            'tcp_negotiation_area_value_id', 'task_construction_parameter_id'
        );
    }
}
