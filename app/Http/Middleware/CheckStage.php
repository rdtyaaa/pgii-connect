<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckStage
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        $student = $user->student;
        if (!$student) {
            return redirect('/student')->with('error', 'Student data not found.');
        }

        // Cek tahapannya
        switch ($student->status) {
            case 'Tahap 1':
                return redirect()->route('payment');
            case 'Tahap 2':
                return redirect()->route('document');
            case 'Tahap 3':
                return redirect()->route('information');
            case 'Tahap 4':
                return redirect()->route('initial-payment');
            default:
                return redirect('/student');
        }

        return $next($request);
    }
}
