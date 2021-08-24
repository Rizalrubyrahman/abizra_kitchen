<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator, Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $input = $request->all();


            $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
            if(auth()->attempt(array($fieldType => $input['username'], 'password' => $input['password'])))
            {

                if(auth()->user()->role == 'admin'){
                    return redirect('/admin/dashboard');
                }else{
                    return redirect('/');
                }
            }
            session()->flash('error','Username atau password yang anda masukan salah');
            return redirect('/');


    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
    public function viewRegister()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $messages = [
            'name.required'     => 'Nama lengkap tidak boleh kosong.',
            'username.required'     => 'Username tidak boleh kosong.',
            'email.required'     => 'Email tidak boleh kosong.',
            'email.unique'     => 'Email yang digunakan sudah adas.',
            'password.required'     => 'Password tidak boleh kosong.',
            'password.min'     => 'password minimal 8 karakter.',
        ];

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:8'
        ], $messages);
        if ($validator->passes()) {
            $user = User::create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'email_verified_at' => NULL,
                'password' => bcrypt($request->password),
                'photo' => NULL,
                'role' => 'user',
                'provider' => NULL,
                'provider_id' => NULL,
                'status' => 'active',
                'remember_token' => NULL,
            ]);
            if(auth()->attempt($request->only('email','password')))
            {
                return redirect('/');

            }
        }else{
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }
}
