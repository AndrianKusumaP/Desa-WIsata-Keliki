<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('username', 'password'))) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->back()->withErrors(['message' => 'Username atau password salah']);
    }

    public function logout(Request $request)
    {
        // Logout user
        Auth::logout();

        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate CSRF token untuk keamanan
        $request->session()->regenerateToken();

        // Redirect ke halaman login atau halaman lain
        return redirect()->route('beranda')->with('status', 'Berhasil logout!');
    }
}
