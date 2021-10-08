<?php

namespace App\Tasks;

use Illuminate\Database\Eloquent\Model;

class TaskTechnicalFurnishing extends Model
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
            ['value' => "Floristry", 'result' => 0], ['value' => "Prospectus holders", 'result' => 0],
            ['value' => "Tables", 'result' => 0], ['value' => "High chairs", 'result' => 0],
            ['value' => "Sofas", 'result' => 0], ['value' => "Armchairs", 'result' => 0],
            ['value' => "Fridge", 'result' => 0], ['value' => "Washing", 'result' => 0]
        ]);
    }
}
