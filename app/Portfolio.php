<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PortfolioImage;
use App\Client;

class Portfolio extends Model
{
    public $fillable = ['client_id', 'title', 'description', 'active'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(PortfolioImage::class);
    }
}
