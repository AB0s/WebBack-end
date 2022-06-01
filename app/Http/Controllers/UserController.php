<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;

class UserController extends Controller
{
    //Show Register/Create form
    public function create(){
        return view('users.register');
    }
    //Create new User
    public function store(Request $request){
        $formFields=$request->validate([
           'name'=>['required','min:3'],
            'email'=>['required', 'email', Rule::unique('users','email')],
            'password'=>'required|confirmed|min:6'
        ]);
        //Hash password
        $formFields['password']=bcrypt($formFields['password']);
        //Create User
        $user=User::create($formFields);
        //Login
        auth()->login($user);
        return redirect('/')->with('message','User created and logged in!');
    }
    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect('/')->with('message', 'You have been logged in!');

    }
    //Login
    public function login(){
        return view('users.login');
    }

    public function authenticate(Request $request){
        $formFields=$request->validate([
            'email'=>['required', 'email'],
            'password'=>'required'
        ]);
        if(auth()->attempt($formFields)){
            $request->session()->regenerate();

            return redirect('/')->with('message','You are now logged in!');
        }
        return back()->withErrors(['email'=>'Invalid Credentials'])->onlyInput('email');
    }
}
