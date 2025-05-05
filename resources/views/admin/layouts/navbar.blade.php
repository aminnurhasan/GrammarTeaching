<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('admin.dashboard') }}">Happy Grammar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAdmin" aria-controls="navbarNavAdmin" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAdmin">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">{{__('admin.navbar_materi')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">{{__('admin.navbar_kuis')}}</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownLanguageAdmin" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('welcome.bahasa_dropdown') }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownLanguageAdmin">
                        <li><a class="dropdown-item" href="{{ route('locale', 'id') }}">Indonesia</a></li>
                        <li><a class="dropdown-item" href="{{ route('locale', 'en') }}">English</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.password.edit') }}">{{__('admin.navbar_gantiPassword')}}</a>
                </li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="nav-link btn btn-link">{{__('admin.logout')}}</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>