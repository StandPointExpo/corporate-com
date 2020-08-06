<?php

namespace App\Tasks;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TaskConstructionParameterWall extends Model
{
    protected $fillable = ['construction_id', 'value'];

    /**
     * @return BelongsTo
     */
    public function taskConstructionParameter()
    {
        return $this->belongsTo(TaskConstructionParameter::class, 'construction_id');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public static function getDefaultValues() : \Illuminate\Support\Collection
    {
        return collect([
            ['value' => "Chipboard box"], ['value' => "Banner"], ['value' => "Standart"], ['value' => "Maxima"],
            ['value' => "Chipboard"], ['value' => "MDF"], ['value' => "Other"]
        ]);
    }
}
