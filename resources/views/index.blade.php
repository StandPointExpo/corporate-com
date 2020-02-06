<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $pageText->site_title ?? 'DEFAULT TITLE'}}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

</head>
<body>
<ul class="navbar-nav ml-auto">
    @foreach (config('app.available_locales') as $locale)
        <li class="nav-item">

            <a class="nav-link"
               href="{{ route('set_locale', [$locale]) }}"
               @if (app()->getLocale() == $locale) style="font-weight: bold; text-decoration: underline" @endif>{{ strtoupper($locale) }}</a>
        </li>
    @endforeach
</ul>
<h2></h2>

</body>
</html>
