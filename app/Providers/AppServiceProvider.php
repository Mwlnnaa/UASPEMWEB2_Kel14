<?php

namespace App\Providers;

// --- Import Models dan Policies Anda di sini ---
use App\Models\JenisProduk;
use App\Policies\JenisProdukPolicy;
use App\Models\KategoriToko;
use App\Policies\KategoriTokohPolicy;
use App\Models\Produk;
use App\Policies\ProdukPolicy;
use App\Models\Testimoni;
use App\Policies\TestimoniPolicy;
use App\Models\User;
use App\Policies\UserPolicy;
// --- Akhir Import ---

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate; // Pastikan ini juga diimpor jika Anda pakai Gate::policy() secara eksplisit

class AppServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // Daftarkan semua policy Anda di sini
        JenisProduk::class => JenisProdukPolicy::class,
        KategoriTokoh::class => KategoriTokohPolicy::class,
        Produk::class => ProdukPolicy::class,
        Testimoni::class => TestimoniPolicy::class,
        User::class => UserPolicy::class,
    ];


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
        // Anda bisa juga mendaftarkan policies satu per satu di sini jika mau
        // Gate::policy(JenisProduk::class, JenisProdukPolicy::class);
        // Gate::policy(KategoriTokoh::class, KategoriTokohPolicy::class);
        // Gate::policy(Produk::class, ProdukPolicy::class);
        // Gate::policy(Testimoni::class, TestimoniPolicy::class);
        // Gate::policy(User::class, UserPolicy::class);
    }
}