<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/">Happy Grammar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">{{ __('welcome.materi_link') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">{{ __('welcome.kuis_link') }}</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownLanguage" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('welcome.bahasa_dropdown') }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownLanguage">
                        <li><a class="dropdown-item" href="{{ route('locale', 'id') }}">Indonesia</a></li>
                        <li><a class="dropdown-item" href="{{ route('locale', 'en') }}">English</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('welcome.login') }}</a>
                </li>
            </ul>
        </div>
    </div>
</nav>