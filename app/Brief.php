<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brief extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
        'company_name',
        'company_person',
        'company_number',
        'company_email',
        'value',
    ];
}
