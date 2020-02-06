<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    public $timestamps = false;

    public $fillable = ['name', 'id'];

    const ENGLISH  = 'en';
    const UKRAINE  = 'ua';
    const RUSSIAN  = 'ru';

    const MAIN_LANGUAGE = self::UKRAINE;

    const ENG_FULL  = 'english';
    const UA_FULL   = 'ukrainian';
    const RU_FULL   = 'russian';


    public static function languages()
    {
        return Language::all()->mapWithKeys( function ($language) {
            return [$language['id'] => $language['name']];
        })->toArray();
    }
    const LANGUAGES = [self::ENGLISH, self::UKRAINE, self::RUSSIAN];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pages()
    {
        return $this->hasMany(Page::class);
    }
}
