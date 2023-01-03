<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function RegisterUser(Request $request){
        $validated = $request->validate([
            'username'=>'required|unique:users|min:5|max:20',
            'email'=>'required|unique:users|email',
            'password'=>'required|min:5|max:20',
            'phoneNum'=>'required|numeric|digits_between:10,13',
            'address'=>'required|min:5'
        ]);

        $user = User::create([
            'username'=>$validated['username'],
            'email'=>$validated['email'],
            'password'=>bcrypt($validated['password']),
            'phoneNum'=>$validated['phoneNum'],
            'address'=>$validated['address'],
            'role'=>'member'
        ]);

        if(Auth::login($user)){
            return redirect('/home');
        }

        return redirect('/login');

    }

    public function LoginUser(Request $request){
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:20'
        ]);

        $remember = $request->remember;

        if(Auth::attempt($validated ,$remember)){
            if($remember){
                Cookie::queue('terminator', $request->email, 120);
            }
            return redirect('/home');
        }

        return redirect()->back()->withErrors('login failed');
    }

    public function LogoutUser(Request $request){
        Auth::logout();
        return redirect('/');
    }

    public function updatePassword(Request $request){
        $validated = $request->validate([
            'oldPass'=>'required',
            'newPass'=>'required|min:5|max:20'
        ]);

        if(!Hash::check($validated['oldPass'], auth()->user()->password)){
            return redirect()->back()->withErrors('old password doesnt match');
        }

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->newPass)
        ]);

        return back()->with("status", "Password changed successfully!");
    }

    public function updateProfile(Request $request){
        $validated = $request->validate([
            'username'=>'required|min:5|max:20',
            'email'=>'required|email',
            'phoneNum'=>'required|numeric|digits_between:10,13',
            'address'=>'required|min:5'
        ]);

        User::whereId(auth()->user()->id)->update([
            'username'=>$validated['username'],
            'email'=>$validated['email'],
            'phoneNum'=>$validated['phoneNum'],
            'address'=>$validated['address'],
        ]);

        return back()->with("status", "Profile changed successfully!");
    }
}
