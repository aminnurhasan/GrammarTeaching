<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{route('user.dashboard')}}">Happy Grammar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                {{-- Menu Dropdown Materi --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMateri" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('welcome.materi_link') }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMateri">
                        @foreach ($kategoris as $kategori)
                        {{-- Dropdown submenu untuk setiap kategori --}}
                        <li class="dropdown-submenu dropend">
                            <a class="dropdown-item dropdown-toggle" href="#">
                                {{ $kategori->nama }}
                            </a>
                            <ul class="dropdown-menu">
                                @if ($kategori->materis->count() > 0)
                                @foreach ($kategori->materis as $materi)
                                <li>
                                    <a class="dropdown-item" href="{{ route('materi.show', $materi->slug) }}">
                                        {{ $materi->judul }}
                                    </a>
                                </li>
                                @endforeach
                                @else
                                <li><span class="dropdown-item disabled">{{ __('user.no_materi') }}</span></li>
                                @endif
                            </ul>
                        </li>
                        @endforeach
                    </ul>
                </li>
                {{-- End Menu Dropdown Materi --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{route('kuis.pretest')}}">{{ __('welcome.kuis_link') }}</a>
                </li>

                {{-- Menu Hasil Kuis --}}
                @if (Auth::check() && $hasCompletedQuiz)
                    @php
                        // Mengambil hasil kuis terbaru untuk pengguna yang sedang login
                        $latestResult = \App\Models\HasilKuis::where('user_id', Auth::id())->latest()->first();
                    @endphp
                    {{-- Pastikan ada hasil kuis sebelum menampilkan tautan --}}
                    @if ($latestResult)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('kuis.hasil', ['id' => $latestResult->id]) }}">Hasil Kuis</a>
                        </li>
                    @endif
                @endif
                {{-- End Menu Hasil Kuis --}}

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
                    <a class="nav-link" href="{{ route('user.password.edit') }}">{{__('user.navbar_gantiPassword')}}</a>
                </li>
                {{-- Tautan Logout --}}
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('user.logout') }}
                    </a>
                </li>

                {{-- Formulir Logout (disembunyikan) --}}
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </ul>
        </div>
    </div>
</nav>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const dropdownSubmenus = document.querySelectorAll('.dropdown-submenu');
        dropdownSubmenus.forEach(function(submenu) {
            let submenuToggle = submenu.querySelector('.dropdown-toggle');
            let submenuMenu = submenu.querySelector('.dropdown-menu');
            let parentDropdown = submenu.closest('.dropdown');

            const showSubmenu = () => {
                submenuMenu.classList.add('show');
                submenu.classList.add('show');
            };

            const hideSubmenu = () => {
                submenuMenu.classList.remove('show');
                submenu.classList.remove('show');
            };

            if (window.innerWidth >= 992) {
                submenu.addEventListener('mouseenter', showSubmenu);
                submenu.addEventListener('mouseleave', hideSubmenu);
            }

            submenuToggle.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation(); 
                
                if (submenuMenu.classList.contains('show')) {
                    hideSubmenu();
                } else {
                    parentDropdown.querySelectorAll('.dropdown-submenu .dropdown-menu.show').forEach(el => {
                        el.classList.remove('show');
                    });
                    showSubmenu();
                }
            });
            
            document.addEventListener('click', function(e) {
                if (!submenu.contains(e.target) && !parentDropdown.contains(e.target)) {
                    hideSubmenu();
                }
            });
        });
    });
</script>

<style>
    .dropdown-submenu {
        position: relative;
    }
    .dropdown-submenu .dropdown-menu {
        top: 0;
        left: 100%;
        margin-top: -6px;
        min-width: 200px;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        border: 1px solid rgba(0,0,0,.15);
    }
    
    @media (min-width: 992px) {
        .dropdown-submenu .dropdown-menu {
            display: none; 
        }
        .dropdown-submenu:hover > .dropdown-menu {
            display: block; 
        }
    }
    
    @media (max-width: 991.98px) {
        .dropdown-submenu .dropdown-menu {
            margin-left: 1rem;
            margin-right: 1rem;
        }
    }
</style>
