@if(request()->is('2fa/confirm*'))

@endif
<header class="guest-header">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a href="/">
                <img src="{{asset('img/Tech4All_Logo.webp')}}" title="logo" width="60" height="55">
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            {{--@if(\Illuminate\Support\Facades\Route::currentRouteName() !== '2fa.confirm')--}}
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('achievements.index')}}">Achievements</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/organizations">Our Organization</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/locations">Our Locations</a>
                    </li>
                    {{--<li class="nav-item">--}}
                    {{--<a class="nav-link" href="/register">Register</a>--}}
                    {{--</li>--}}
                    <li class="nav-item">
                        @if(\App\Helpers\EsUtils::isAdmin())
                            <a class="nav-link" href="{{route('admin.members.index')}}">Members</a>
                        @elseif (\App\Helpers\EsUtils::isEmployee())
                            <a class="nav-link" href="{{route('events.index')}}">Events</a>
                        @else
                            <a class="nav-link" href="{{route('login')}}">Login</a>

                        @endif
                    </li>
                </ul>
            </div>
                {{--@endif--}}
        </div>
    </nav>
</header>
