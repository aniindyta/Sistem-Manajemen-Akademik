<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    protected $user;
    public function login() {
        return view('login');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }

    public function register() {
        return view('register');
    }

    // public function __construct()
    // {
    //     $this->middleware(function ($request, $next) {

    //         $this->user = Auth::user();

    //         return $next($request);
    //     });
    // }

    public function authenticating(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($credentials)) {
            if(Auth::user()->role == 'Admin') {
                return redirect('dashboard');
            }
        }

        if(Auth::attempt($credentials)) {
            if(Auth::user()->role == 'Dosen') {
                return redirect('dashboard');
            }
        }

        // nanti mau nambah dosen sama mahasiswa kalo sempet

        Session::flash('status', 'failed');
        Session::flash('message', 'Login Invalid');
        return redirect('/login');
    }

    public function registerProses(Request $request) {
        $validated = $request->validate([
            'name' => 'required | max: 255',
            'email' => 'required | unique:users',
            'password' => 'required | min: 8',
        ]);
        $request->password = Hash::make($request->password);
        $user = User::create($request->all());
        return redirect('login');
    }
}