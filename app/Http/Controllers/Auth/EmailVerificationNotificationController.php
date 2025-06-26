<?php
// filepath: app/Http/Controllers/Auth/EmailVerificationNotificationController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request): RedirectResponse
    {
        Log::info('=== EMAIL VERIFICATION REQUEST START ===');
        Log::info('Request method: ' . $request->method());
        Log::info('Request URL: ' . $request->fullUrl());
        Log::info('CSRF Token: ' . $request->input('_token'));
        
        try {
            $user = $request->user();
            
            if (!$user) {
                Log::error('No authenticated user found');
                return back()->with('error', 'User tidak terautentikasi');
            }

            Log::info('User authenticated: ' . $user->email . ' (ID: ' . $user->id . ')');
            Log::info('User verified status: ' . ($user->hasVerifiedEmail() ? 'true' : 'false'));

            if ($user->hasVerifiedEmail()) {
                Log::info('User email already verified, redirecting to home');
                return redirect()->intended(RouteServiceProvider::home());
            }

            Log::info('=== ATTEMPTING TO SEND EMAIL ===');
            
            // Test email configuration
            $mailConfig = [
                'mailer' => config('mail.default'),
                'host' => config('mail.mailers.smtp.host'),
                'port' => config('mail.mailers.smtp.port'),
                'from' => config('mail.from.address'),
            ];
            Log::info('Mail config: ', $mailConfig);

            // Send verification notification
            $user->sendEmailVerificationNotification();
            
            Log::info('=== EMAIL SENT SUCCESSFULLY ===');
            
            return back()->with('status', 'verification-link-sent');

        } catch (\Exception $e) {
            Log::error('=== EMAIL VERIFICATION FAILED ===');
            Log::error('Error: ' . $e->getMessage());
            Log::error('File: ' . $e->getFile());
            Log::error('Line: ' . $e->getLine());
            Log::error('Stack trace: ' . $e->getTraceAsString());
            
            return back()->with('error', 'Gagal mengirim email: ' . $e->getMessage());
        }
    }
}