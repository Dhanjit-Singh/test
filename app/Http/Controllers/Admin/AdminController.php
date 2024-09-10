<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function register(){
        return view('admin.registration');
    }

    public function registerPost(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ],[
            'name.required' => 'Please enter name',
            'email.required' => 'Please enter email',
            'password.required' => 'Please enter password',
        ]);
        if($request->hasFile('adminRegImg')){
            $image = $request->file('adminRegImg');
            $imageName = time(). '.' .$image->getClientOriginalExtension();
            $image->storeAs('public/adminImage', $imageName);
            $admin_img = asset('storage/adminImage/'.$imageName);
        }
        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'decrypt_password' => $request->password,
            'image' => $admin_img
        ]);
        return redirect()->route('admin.login')->with('success', 'Admin created successfully.');
    }

    public function login(){
        return view('admin.login');
    }

    public function loginPost(Request $request){
        $admin = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if(Auth::guard('admin')->attempt($admin)){
            return redirect()->route('admin.home')->with('success', 'Admin logged in successfully.');
        }else{
            return redirect()->back()->with('error', 'Invalid credentials');
        }
    }

    public function home(){
        $admin = Auth::guard('admin')->user();
        return view('admin.home', compact('admin'));
    }

    public function logout(Request $request){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('success', 'Logged out successfully.');
    }
}
