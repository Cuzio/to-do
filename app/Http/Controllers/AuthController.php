<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function register(){
        return view('auth.register');
    }

    public function registerUser(Request $request){
        $validator = Validator::make($request->all(), [
            'first_name' => "required|string",
            'last_name' => "required|string",
            'phone' => "required|string",
            'gender' => "required",
            'email' => "required|email|unique:users",
            'password' => 'required|confirmed|string|min:8',
        ]);

        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }
        // dd($request->all());

        $formFields = [
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'phone' => $request->input('phone'),
            'gender' => $request->input('gender'),
            'email' => strtolower($request->input('email')),
            'password' => bcrypt($request->input('password')),
        ];

        $image = uniqid().'-'.'profile-image'.'.'.$request->image->extension();

        // to save the profile image in the project in a folder called profile.
        $request->image->move(public_path('profile'), $image);

        $formFields['image'] = $image;

        $user = User::create($formFields);

        if($user){
            Auth::login($user);
            return redirect('/')->with('success', 'Registration was successful');
        }else{
            return redirect()->back()->with('error', 'An error has occurred');
        }
    }
}