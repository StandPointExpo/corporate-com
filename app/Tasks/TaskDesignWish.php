<?php

namespace App\Tasks;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class TaskDesignWish extends Model
{
    protected $fillable = [
        'task_id',
        'estimated_budget',
        'design_wishes_notes',
        'branding_presentation',
        'presentation_notes'
    ];

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

    //todo "Образы(имидж) для оформления", "Брендбук и корпоративные цвета", "Образы(имидж), которые нравятся клиенту", "Эскизы от клиента", "Другие файлы".
//    public function designFiles()
//    {
//
//    }
//    public function brandbookFiles()
//    {
//
//    }
//    public function clientLikeFiles()
//    {
//
//    }
//    public function sketchFiles()
//    {
//
//    }
//    public function otherFiles()
//    {
//
//    }


}
