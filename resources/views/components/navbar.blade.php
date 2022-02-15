<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top border-bottom">
    <a class="navbar-brand" href="{{ route('home') }}">
        {{ config('app.name', 'Laravel') }}
    </a>

    <div class="collapse navbar-collapse" id="navbarContent">
        <ul class="navbar-nav ml-auto">

            @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">{{__('messages.home' )}}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('order.cart') }}">{{ __('messages.cart' )}}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('account.update') }}">{{ __('messages.profile' )}}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('order.history') }}">{{ __('messages.history' )}}</a>
                </li>

                @if (Auth::user()->isAdmin())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('account.maintenance') }}">{{__('messages.maintenance' )}}</a>
                    </li>
                @endif

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('account.logout') }}">{{ __('messages.logout' )}}</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('account.login') }}">{{ __('messages.login' )}}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('account.register') }}">{{ __('messages.register' )}}</a>
                </li>
            @endauth

            <div class="dropdown ml-4">
                <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ App::currentLocale() }}
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="/language/en">English</a>
                    <a class="dropdown-item" href="/language/id">Indonesian</a>
                </div>
            </div>
        </ul>
    </div>
</nav>
