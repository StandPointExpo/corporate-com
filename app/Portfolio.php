<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PortfolioImage;
use App\Client;

class Portfolio extends Model
{
    public $fillable = ['title', 'description', 'active', 'client'];

    protected $with = ['images'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(PortfolioImage::class);
    }
}
