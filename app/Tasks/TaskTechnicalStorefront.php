<?php

namespace App\Tasks;

use Illuminate\Database\Eloquent\Model;

class TaskTechnicalStorefront extends Model
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
            ['value' => "Vertical exclusive", 'result' => 0], ['value' => "Horizontal exclusive", 'result' => 0],
            ['value' => "Vertical standard", 'result' => 0], ['value' => "Horizontal standard", 'result' => 0],
        ]);
    }
}
