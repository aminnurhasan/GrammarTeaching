<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Kategori;
use App\Models\HasilKuis;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('user.layouts.app', function ($view) {
            // Mengambil semua data kategori dan materi terkait
            $kategoris = Kategori::with('materis')->get();
            
            // Mengecek apakah user sudah menyelesaikan kuis
            $hasCompletedQuiz = false;
            if (Auth::check()) {
                $hasCompletedQuiz = HasilKuis::where('user_id', Auth::id())->exists();
            }

            // Mengirimkan kedua variabel ke view
            $view->with('kategoris', $kategoris)->with('hasCompletedQuiz', $hasCompletedQuiz);
        });
    }
}
