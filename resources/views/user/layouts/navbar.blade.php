{{--
|--------------------------------------------------------------------------
| resources/views/user/layouts/navbar.blade.php
|--------------------------------------------------------------------------
|
| Ini adalah file partial untuk navbar.
| Kode ini telah diperbarui untuk memperbaiki bug submenu dropdown.
|
--}}
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/">Happy Grammar</a>
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
                    <a class="nav-link" href="{{route('kuis.biodata')}}">{{ __('welcome.kuis_link') }}</a>
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

{{--
|--------------------------------------------------------------------------
| Custom JavaScript untuk Submenu Dropdown Bootstrap 5
|--------------------------------------------------------------------------
|
| Skrip ini menambahkan fungsionalitas submenu dropdown yang tidak ada secara native di Bootstrap 5.
| Skrip ini berfungsi untuk desktop (hover) dan mobile (click).
|
--}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Mendapatkan semua dropdown submenu
        const dropdownSubmenus = document.querySelectorAll('.dropdown-submenu');

        // Menambahkan event listener untuk setiap submenu
        dropdownSubmenus.forEach(function(submenu) {
            let submenuToggle = submenu.querySelector('.dropdown-toggle');
            let submenuMenu = submenu.querySelector('.dropdown-menu');
            let parentDropdown = submenu.closest('.dropdown');

            // Fungsi untuk menampilkan submenu
            const showSubmenu = () => {
                submenuMenu.classList.add('show');
                submenu.classList.add('show');
            };

            // Fungsi untuk menyembunyikan submenu
            const hideSubmenu = () => {
                submenuMenu.classList.remove('show');
                submenu.classList.remove('show');
            };

            // Event untuk desktop (hover)
            if (window.innerWidth >= 992) {
                submenu.addEventListener('mouseenter', showSubmenu);
                submenu.addEventListener('mouseleave', hideSubmenu);
            }

            // Event untuk mobile (click)
            submenuToggle.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation(); // Mencegah event click menyebar ke parent
                
                // Toggle kelas 'show'
                if (submenuMenu.classList.contains('show')) {
                    hideSubmenu();
                } else {
                    // Sembunyikan semua submenu lain sebelum menampilkan yang ini
                    parentDropdown.querySelectorAll('.dropdown-submenu .dropdown-menu.show').forEach(el => {
                        el.classList.remove('show');
                    });
                    showSubmenu();
                }
            });
            
            // Menutup submenu saat mengklik di luar
            document.addEventListener('click', function(e) {
                if (!submenu.contains(e.target) && !parentDropdown.contains(e.target)) {
                    hideSubmenu();
                }
            });
        });
    });
</script>

{{--
|--------------------------------------------------------------------------
| Custom CSS untuk Submenu Dropdown
|--------------------------------------------------------------------------
|
| CSS ini menyesuaikan posisi submenu agar tampil di samping item parent.
|
--}}
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
    
    /* Perilaku di layar lebar */
    @media (min-width: 992px) {
        .dropdown-submenu .dropdown-menu {
            display: none; /* Sembunyikan secara default untuk desktop */
        }
        .dropdown-submenu:hover > .dropdown-menu {
            display: block; /* Tampilkan saat di-hover */
        }
    }
    
    /* Perilaku di layar kecil */
    @media (max-width: 991.98px) {
        .dropdown-submenu .dropdown-menu {
            margin-left: 1rem;
            margin-right: 1rem;
        }
    }
</style>
