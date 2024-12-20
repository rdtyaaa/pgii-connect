<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class GoogleAuthController extends Controller
{
    // Redirect to Google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')
            ->scopes(['profile', 'email'])
            ->redirect();
    }

    // Handle callback from Google
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();

            $user = User::updateOrCreate(
                ['email' => $googleUser->getEmail()],
                [
                    'name' => $googleUser->getName(),
                    'avatar' => $googleUser->getAvatar(),
                    // 'password' => bcrypt(Str::random(16)),
                ],
            );

            Auth::login($user);
            $student = $user->student;

            // Jika user adalah admin, redirect ke dashboard admin
            if ($user->is_admin) {
                return redirect()->route('admin.dashboard');
            }

            if (!$student) {
                return redirect('/student');
            }

            switch ($student->status) {
                case 'Tahap 1':
                    return redirect()->route('payment', ['paymentType' => 'formulir']);
                case 'Tahap 2':
                    return redirect()->route('document');
                case 'Tahap 3':
                    return redirect()->route('information');
                case 'Tahap 4':
                    return redirect()->route('initial-payment');
                default:
                    return redirect()->route('dashboard');
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect('/login')->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }
}
