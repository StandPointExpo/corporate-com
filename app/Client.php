<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Portfolio;

class Client extends Model
{
    public $fillable = ['name', 'description'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function portfolios()
    {
        return $this->hasMany(Portfolio::class);
    }
}
