<?php

namespace App\Http\Middleware;

use Closure;
use App\Language;

class LocaleMiddleware
{

    public static function getLocale()
    {

        $segmentsURI = request()->segment(1);

        return !empty($segmentsURI) && in_array($segmentsURI, Language::LANGUAGES)
            ? $segmentsURI
            : Language::MAIN_LANGUAGE;
    }

    public function handle($request, Closure $next)
    {
        $locale = self::getLocale();

        $locale ? app()->setLocale($locale) : app()->setLocale(Language::MAIN_LANGUAGE);

        return $next($request);
    }
}
