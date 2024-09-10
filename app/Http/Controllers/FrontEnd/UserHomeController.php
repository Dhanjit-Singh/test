<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserHomeController extends Controller
{
    public function register(){
        return view('frontEnd.register');
    }

    public function registerPost(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ],[
            'name.required' => 'please enter name.',
            'email.required' => 'please enter email.',
            'password.required' => 'please enter password.',
        ]);

        if($request->hasFile('userRegImg')){
            $image = $request->file('userRegImg');
            $imageName = time(). '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/userImage', $imageName);
            $user_img = asset('storage/userImage/'.$imageName);
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'decrypt_password' => $request->password,
            'image' => $user_img,
        ]);
        return redirect()->route('user.login')->with('success', 'User registered successfully.');
    }

    public function login(){
        return view('frontEnd.login');
    }

    public function loginPost(Request $request){
        $user = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if(Auth::guard('user')->attempt($user)){
            return redirect()->route('user.home')->with('success', 'User logged in successfully.');
        }else{
            return redirect()->back()->with('error', 'Invalid credentials.');
        }
    }

    public function home(){
        $user = Auth::guard('user')->user();
        return view('frontEnd.home', compact('user'));
    }

    public function logout(){
        Auth::guard('user')->logout();
        return redirect()->route('user.login')->with('success', 'User logged out successfully.');
    }
}
