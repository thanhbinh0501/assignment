<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            // Đăng nhập thành công
            $user = Auth::user();

            // Kiểm tra nếu người dùng là admin
            if ($user->is_admin) {
                return redirect()->intended('/admin/articles'); // Chuyển hướng đến trang admin
            }

            // Nếu không phải admin, chuyển hướng đến trang chính hoặc trang khác
            return redirect()->intended('/'); // Thay đổi route theo nhu cầu
        }

        return back()->withErrors([
            'email' => 'Thông tin đăng nhập không đúng.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
