<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    protected $redirectTo = '/admin/dashboard'; // Lokasi redirect setelah login

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Auth success
            return redirect()->intended($this->redirectTo);
        }

        // Auth failed
        return redirect()->back()->withInput()->withErrors(['msg' => 'Invalid credentials']);
    }

    // public function login(Request $request)
    // {
    //     $user = User::where('username', $request->username)->first();

    //     if (!$user || !Hash::check($request->password, $user->password)) {
    //         return response()->json(['message' => 'Invalid credentials'], 401);
    //     }

    //     $token = $user->createToken('auth_token')->plainTextToken;

    //     return response()->json([
    //         'token' => $token,
    //         'role' => $user->role,
    //         'user_id' => $user->id,
    //     ], 200);
    // }


    // Proses logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect('/');
    }
}
