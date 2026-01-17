{{-- resources/views/partials/header.blade.php --}}
<header class="header-section">
    <!-- Top Bar -->
    <div class="top-nav">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div>
                    <ul class="tn-left">
                        <li><i class="fa fa-phone"></i> (+228) 90 00 00 00</li>
                        <li><i class="fa fa-envelope"></i> contact@geshotel.com</li>
                    </ul>
                </div>
                <form class="hero-form" action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-link logout-button">Déconnexion</button>
    </form>
                <div class="d-flex align-items-center gap-3">

                    <!-- Bouton Réserver -->
                    <a href="{{ route('chambres.index') }}" class="bk-btn">
                        Réserver maintenant
                    </a>

                    @guest
                        <a href="{{ route('login') }}" class="bk-btn" style="background: #dfa974;">
                            Connexion
                        </a>
                        <a href="{{ route('register') }}" class="bk-btn" style="background: #c49b63; color: white;">
                            Inscription
                        </a>
                    @else
                        {{-- Menu utilisateur --}}
                        <div class="dropdown d-inline-block">
                            <a href="#" 
                               class="bk-btn dropdown-toggle" 
                               data-toggle="dropdown" 
                               aria-haspopup="true" 
                               aria-expanded="false"
                               style="background: #dfa974; color: white;">
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="{{ route('profile.edit') }}" class="dropdown-item">
                                    Mon profil
                                </a>

                                {{-- tu activeras cette route plus tard si tu veux --}}
                                {{-- <a href="{{ route('reservations.index') }}" class="dropdown-item">
                                    Mes réservations
                                </a> --}}

                                @if(Auth::user()->isAdmin())
                                    <div class="dropdown-divider"></div>
                                    <a href="{{ route('admin.dashboard') }}" class="dropdown-item text-primary font-weight-bold">
                                        Administration
                                    </a>
                                @endif

                                <div class="dropdown-divider"></div>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        Déconnexion
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </div>

    <!-- Main Menu -->
    <div class="menu-item">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-2">
                    <div class="logo">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('template/img/logo.png') }}" alt="GesHotel">
                        </a>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="nav-menu">
                        <nav class="mainmenu">
                            <ul>
                                <li class="{{ request()->is('/') ? 'active' : '' }}">
                                    <a href="{{ route('home') }}">Accueil</a>
                                </li>
                                <li class="{{ request()->is('chambres*') ? 'active' : '' }}">
                                    <a href="{{ route('chambres.index') }}">Chambres</a>
                                </li>
                                <li class="{{ request()->is('a-propos') || request()->is('about') ? 'active' : '' }}">
                                    <a href="{{ route('about') }}">À propos</a>
                                </li>
                                <li class="{{ request()->is('contact') ? 'active' : '' }}">
                                    <a href="{{ route('contact') }}">Contact</a>
                                </li>
                            </ul>
                        </nav>
                        <div class="nav-right search-switch">
                            <i class="icon_search"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>