<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Services\LoginService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    protected $loginService;

    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }
//    function showFormLogin()
//    {
//        return view('frontend.login');
//    }
//
//    function login(LoginRequest $request)
//    {
//        $this->validate($request, [
//            'email' => 'required|email:filter',
//            'password' => 'required'
//        ]);
//
//        if ($this->loginService->checkLogin($request)) {
//            return view('welcome');
//        }
//
//        Session::flash('error', 'Tài khoản mật khẩu không chính xác!');
//
//
//        return back();
//    }
    function showFormLogin()
    {
        return view('backend.users.login');
    }

    function login(LoginRequest $request)
    {
        $this->validate($request, [
            'email' => 'required|email:filter',
            'password' => 'required'
        ]);

        if ($this->loginService->checkLogin($request)) {
            return redirect()->route('users.index');
        }
        return back()->with('error', 'Tài khoản hoặc mật khẩu không chính xác!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }


    public function showFormChangePassword(){
        return view('frontend.change-password');
    }


    public function changePassword(Request $request){
        $user = Auth::user();
        $currentPassword = $user->password;
        $request->validate([
            'currentPassword' => 'required',
            'newPassword' => 'required|min:3|different:currentPassword',
            'confirmPassword' => 'required|same:newPassword',

        ]);
        if(!Hash::check($request->currentPassword, $currentPassword)){
            return redirect()->back()->withErrors(['currentPassword' => 'Sai Password hiện tại ']);
        }
        $user->password = Hash::make($request->newPassword);
        $user->save();
        Session::flash('success', 'Đổi Mật Khẩu Thành Công');
        return redirect()->route('login');
    }
}
