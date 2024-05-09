<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('admin.auth.login');
    }

    public function login(LoginRequest $request)
    {
        // dd($request->all());
        if (!Auth::attempt($request->only(['email', 'password']))) {
            return response()->json([
                'message' => 'Credentials do not match!',
                'success' => false,
            ], 401);
        }
        return response()->json(['message' => 'Login Successfull', 'success' => true]);
    }
    public function logout(){
        auth()->logout();
        return redirect()->route('login.view');
    }
}
