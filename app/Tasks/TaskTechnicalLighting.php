<?php

namespace App\Tasks;

use Illuminate\Database\Eloquent\Model;

class TaskTechnicalLighting extends Model
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
            ['value' => "Xenon", 'result' => 0], ['value' => "Fixtures on the bus(black)", 'result' => 0],
            ['value' => "LED fixtures(black)", 'result' => 0], ['value' => "Bracket lamp", 'result' => 0],
            ['value' => "Ceiling (chiseled)", 'result' => 0], ['value' => "LED-string", 'result' => 0]
        ]);
    }
}
