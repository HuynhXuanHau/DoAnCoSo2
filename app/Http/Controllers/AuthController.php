<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {
        $uname = $request->input('uname');
        $password = $request->input('password');

        if (empty($uname) || empty($password)) {
            return redirect()->back()->with('error', 'User Name and Password are required');
        }

        $user = DB::table('users')->where('user_name', $uname)->first();

        if ($user && Hash::check($password, $user->user_password)) {
            Session::put('user_name', $user->user_name);
            Session::put('user_id', $user->user_id);
            
            if ($user->user_name === 'admin') {
                return redirect()->route('admin.home');
            } else {
                return redirect()->route('home');
            }
        } else {
            return redirect()->back()->with('error', 'Incorrect User Name or Password');
        }
    }
    // app/Http/Controllers/AuthController.php
    public function logout(Request $request)
    {
        Auth::logout();  // Log the user out
        $request->session()->invalidate();  // Invalidate the session
        $request->session()->regenerateToken();  // Regenerate the CSRF token
    
        return redirect('login');
    }
    public function register(Request $request)
    {
        // Validate input data
        $validated = $request->validate([
            'rg_name' => 'required|max:255',
            'rg_email' => 'required|email|unique:users,mail|max:255',
            'rg_password' => 'required|min:6|confirmed',
            'checkAgree' => 'accepted'  
        ]);
    
      
            // Create a new user
            $user = User::create([
                'user_name' => $request->rg_name,
                'mail' => $request->rg_email, // Ensure column name matches
                'user_password' => Hash::make($request->rg_password),
                'is_admin' => false,
            ]);
            
            // Redirect to login page after successful registration
            return redirect()->route('login')->with('success', 'Đăng ký thành công!');
    
    }
    
}
