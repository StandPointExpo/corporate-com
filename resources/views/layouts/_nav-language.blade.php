<ul class="nav justify-content-end">
    @foreach (config('app.available_locales') as $locale)
        <li class="nav-item">

            <a class="nav-link"
               href="{{ route('set_locale', [$locale]) }}"
               @if (app()->getLocale() == $locale) style="font-weight: bold; text-decoration: underline" @endif>{{ strtoupper($locale) }}</a>
        </li>
    @endforeach
</ul>
