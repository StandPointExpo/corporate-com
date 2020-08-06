<?php

namespace App\Tasks;

use Illuminate\Database\Eloquent\Model;

class TaskTechnicalMultimedia extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'technical_parameters_id',
        'value',
        'result',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function taskTechnicalParameter()
    {
        return $this->belongsTo(TaskTechnicalParameter::class, 'technical_parameters_id');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public static function getDefaultValues() : \Illuminate\Support\Collection
    {
        return collect([
            ['value' => "Plasma", 'result' => 0], ['value' => "LED-screen", 'result' => 0],
            ['value' => "Infinity", 'result' => 0]
        ]);
    }
}
