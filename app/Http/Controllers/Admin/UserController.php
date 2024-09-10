<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ],[
            'name.required' => 'please enter name.',
            'email.required' => 'please enter email.',
            'password.required' => 'please enter password.',
        ]);

        if($request->hasFile('userRegImAdmin')){
            $image = $request->file('userRegImAdmin');
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
        return redirect()->route('admin.users.index')->with('success', 'User registered successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ],[
            'name.required' => 'please enter name.',
            'email.required' => 'please enter email.',
            'password.required' => 'please enter password.',
        ]);

        if($request->hasFile('userRegImgUp')){
            $image = $request->file('userRegImgUp');
            $imageName = time(). '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/userImage', $imageName);
            $user_img = asset('storage/userImage/'.$imageName);
            if ($user->image && $user->image !== $user_img) {
                // Get the path from the URL and remove 'storage/' prefix
                $existingImagePath = str_replace('/storage/userImage/', '', parse_url($user->image, PHP_URL_PATH));
                unlink(storage_path('app/public/userImage/' . $existingImagePath));
            } else {
            $user_img = $user->image;
            }
        }else{
            $user_img = $user->image;
        }   

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'decrypt_password' => $request->password,
            'image' => $user_img,
        ]);
        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if ($user->image && $user->image !== null) {
            // Get the path from the URL and remove 'storage/' prefix
            $existingImagePath = str_replace('/storage/userImage/', '', parse_url($user->image, PHP_URL_PATH));
            unlink(storage_path('app/public/userImage/' . $existingImagePath));
        } 
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
}
