<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    function showFormRegister()
    {
        return view('frontend.register');
    }

    function register(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->address = $request->address;
        $user->role = $request->role;
        $user->save();

        Session::flash('success', 'Đăng ký thành công');
        return redirect()->route('formLogin');
    }
}
