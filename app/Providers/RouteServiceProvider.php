<?php
namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     */
    public const HOME = '/';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        $this->routes(function () {
            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }

    /**
     * Get the home path based on user role after authentication.
     */
    public static function home(): string
    {
        $user = Auth::user();

        if (!$user) {
            return static::HOME;
        }

        return match($user->role) {
            'admin' => '/admin/dashboard',
            'company' => '/perusahaan/dashboard',
            'sponsor' => '/sponsor/dashboard',
            'umkm' => '/umkm/dashboard',
            default => static::HOME
        };
    }

    /**
     * Get redirect path for specific role
     */
    public static function redirectTo(string $role = null): string
    {
        if (!$role && Auth::check()) {
            $role = Auth::user()->role;
        }

        return match($role) {
            'admin' => '/admin/dashboard',
            'company' => '/perusahaan/dashboard',
            'sponsor' => '/sponsor/dashboard',
            'umkm' => '/umkm/dashboard',
            'student' => '/student/dashboard',
            default => static::HOME
        };
    }
}