<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse|JsonResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
        ], [
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
        ]);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($request->expectsJson()) {
            return $status == Password::RESET_LINK_SENT
                ? response()->json([
                    'success' => true,
                    'message' => 'Link reset password telah dikirim ke email Anda!'
                ])
                : response()->json([
                    'success' => false,
                    'message' => 'Email tidak ditemukan dalam sistem kami.',
                    'errors' => ['email' => [__($status)]]
                ], 422);
        }

        return $status == Password::RESET_LINK_SENT
                    ? back()->with('status', 'Link reset password telah dikirim ke email Anda!')
                    : back()->withInput($request->only('email'))
                        ->withErrors(['email' => __($status)]);
    }
}