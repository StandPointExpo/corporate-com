<div class="justify-content-end dropdown" v-bind:class="[langMenu ? 'show-lang-block' : '']">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="langDropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" @click="langMenu = !langMenu">
        {{app()->getLocale()}}
    </button>
    <ul class="nav navbar-nav" v-bind:class="[langMenu ? 'show-lang' : '']">
        @foreach (config('app.available_locales') as $locale)
            <li class="nav-item">
                <a href="{{ route('set_locale', [$locale]) }}"
                   class="nav-link @if (app()->getLocale() == $locale)active @endif">{{ strtoupper($locale) }}</a>
            </li>
        @endforeach
    </ul>
</div>
