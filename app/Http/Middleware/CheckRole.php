<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        
        // Check if user has any of the required roles
        if (!in_array($user->role, $roles)) {
            // Redirect to appropriate dashboard based on user's actual role
            $redirectPath = match($user->role) {
                'admin' => '/admin/dashboard',
                'company' => '/perusahaan/dashboard',
                'sponsor' => '/sponsor/dashboard',
                'umkm' => '/umkm/dashboard',
                default => '/'
            };

            return redirect($redirectPath)->with('error', 'Anda tidak memiliki akses ke halaman tersebut.');
        }

        return $next($request);
    }
}