<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register(){
        return view("register");
    }
    public function login(){
        return view("login");
    }

    public function makeLogin(Request $request){
        $fields = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $result = auth()->attempt($fields);

        if($result){
            return redirect(route('dashboard'))->with('success','Добре дошъл/дошла!');
        }
        else{
            return redirect(route('login'))->with('wrong', 'Грешен имейл или парола...');
        }
    }

    public function logout(){
        auth()->logout();

        return redirect(route('login'))->with('success', 'Ти излезна от акаунта си успешно!');
    }

    public function makeRegistration(Request $request){
        $fields = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6'
        ]);

        $fields['password'] = bcrypt($request->password);

        $user = User::create($fields);

        auth()->login($user);

        return redirect(route('dashboard'))->with('success','Акаунта беше създаден! Добре дошъл/дошла ' . $user->name);
    }
}
