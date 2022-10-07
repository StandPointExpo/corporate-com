<nav class="navbar navbar-expand-md navbar-dark fixed-top px-0" id="headerMenu">
    <button class="navbar-toggler" type="button" v-bind:class= "[mobileMenu ? 'active' : '']"
            data-toggle="collapse"
            data-target="#navbarCollapse"
            aria-controls="navbarCollapse"
            aria-expanded="false"
            aria-label="Toggle navigation" @click="mobileMenu = !mobileMenu">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="container-fluid menu-container">
        <div class="row col-12 py-2">
            <div class="collapse navbar-collapse offset-md-0 offset-lg-1 offset-xl-1 offset-sm-0 px-md-3 col-md-6 col-lg-5" v-bind:class= "[mobileMenu ? 'show' : '']" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    @foreach([
                trans('ui.main')        => 'main',
                trans('ui.portfolio')   => 'portfolios',
                trans('ui.contacts')    => 'contacts' ] as $name => $route)
                        <li class="nav-item">
                            <a class="nav-link {{ \Request::route()->getName() == $route ? 'active' : ''}} " href="{{ route($route) }}">{{ $name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="form-inline my-0 phones-menu col-md-4 col-xl-4 col-10 justify-content-sm-start justify-content-md-end">
                <img src="/images/icons/phone_1.svg">
                @if(isset($contact) && $contact != null)
                        @foreach($contact->phones as $key => $phone)
                            @if($loop->even)
                                ,&nbsp;
                            @endif
                            <a href="tel:{{$phone->phone}}" class="big-phone">{{$phone->phone}}</a>
                        @endforeach
                @endif
            </div>
            <div class="form-inline lang-menu col-2">
{{--                @include('layouts._nav-language')--}}
            </div>
        </div>
    </div>
</nav>

