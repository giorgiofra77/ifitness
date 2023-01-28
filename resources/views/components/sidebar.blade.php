<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse mt-2">
    <div class="position-sticky pt-3 list-group">
        <ul class="nav flex-column">
            <li class="nav-item">
            <a class="nav-link" href="{{route('homepage.index')}}">
                <i class="bi bi-house-door-fill me-1"></i>
                {{ __('messages.home') }}
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{ route('customers.index') }}">
                <i class="bi bi-people-fill me-1"></i>
                {{ __('messages.customers') }}
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{ route('subscriptions.index') }}">
                <i class="bi bi-postcard me-1"></i>
                {{ __('messages.subscriptions') }}
            </a>
            </li>

            <li class="nav-item">
            <a class="nav-link" href="{{route('allsub')}}" role="link" aria-expanded="false">
                <i class="bi bi-card-heading me-2"></i>Iscrizioni</a>
            </li>

            @auth
                <li class="nav-item">

                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                   aria-expanded="false">
                    <i class="bi bi-person-workspace me-2"></i>{{Auth::user()->name}}</a>
                <ul class="dropdown-menu">
                    @if (Auth::user()->is_admin)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('users.index') }}"><i
                                    class="bi bi-people-fill me-1"></i>
                                {{ __('Utenti') }}</a>
                        </li>
                    @endif
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class="bi bi-box-arrow-left me-1"></i>
                            {{ __('Uscita') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                </ul>
                </li>
            @endauth
        </ul>
    </div>
</nav>
