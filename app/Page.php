<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Article;

class Page extends Model
{
    public $fillable = ['name', 'description'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
