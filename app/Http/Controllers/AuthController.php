<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{


    public function renderLoginPage(Request $request){

        return view('auth.login');
    }

    public function loginStore(Request $request){

        $userValidator = $request->validate([
            'email' => 'required|email|string',
            'password' => 'required|string'
        ]);

        $user = User::where('email' , $userValidator['email'])->first();

        if(!$user){

            return redirect()->back()->with('invalid_email' , 'Invalid Email');
        }

        if(!Hash::check($userValidator['password'] ,  $user->password)){

            return  redirect()->back()->with('invalid_password' , 'Invalid Password');

        }
        Auth::login($user);

        return redirect()->to('/');
}

public function signup(Request $request){

    $userValidator = $request->validate([
            'email' => 'required|email|string',
            'password' => 'required|string|confirmed'
    ]);

    $user = User::where('email' , $userValidator['email'])->first();

    if($user){
        return redirect()->back()->with('user_exists' , 'User already exists');
    }

    $hashedPassword = Hash::make($userValidator['password']);

    User::create([
        'email' => $userValidator['email'],
        'password' => $hashedPassword,
        ]);

    return redirect()->to("/auth/login")->with('signup_success' , 'You have signed up successsfully');

}

public function logout(Request $request){
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/auth/login');
}

public function register(Request $request){


    return view('auth.register');
}

}


