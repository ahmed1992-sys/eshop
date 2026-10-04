<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth ;

class CoursesLogin extends Controller
{
    public function courses_login(){
        return view('courses.login');
    }
        public function courses_authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('dashboard')->attempt($credentials)) {
            $request->session()->regenerate();

              return to_route('courses.index');
            //return redirect()->intended('');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
public function courses_logout(Request $request)
{
    Auth::guard('dashboard')->logout();

    $request->session()->invalidate();// عشان ميحلصش لخبط مع سيشن /wep/   ويشيل السيشن الخاص به   invaldate بدل  regenerate عملت

    $request->session()->regenerateToken();

    return to_route('courses_login.courses_login');
}

}
