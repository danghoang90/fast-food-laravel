<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\EditUserRequest;
use App\Http\Services\LoginService;
use App\Models\Role;
use App\Models\User;
//use Illuminate\Auth\Access\Gate;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\LoginRequest;

class UserController extends Controller
{
    private $user;
    private $role;
    private $loginService;

    public function __construct(User $user, Role $role,LoginService $loginService)
    {
        $this->user = $user;
        $this->role = $role;
        $this->loginService = $loginService;
    }

    public function index()
    {
        $listUser = User::paginate(4);
        return view('backend.users.index', compact('listUser'));
    }

    public function create()
    {
        $roles = $this->role->all();
        return view('backend.users.add', compact('roles'));
    }

    public function store(CreateUserRequest $request)
    {
        DB::beginTransaction();
        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
            $user->roles()->sync($request->role);
            DB::commit();
        }catch (\Exception $exception) {
            DB::rollBack();
        }
        return redirect()->route('users.index')->with('success', 'Thêm thành công người dùng !');
    }

    public function destroy($id)
    {
        if (Gate::allows('user-crud')) {
            $user = User::findOrFail($id);
//            dd($user->role);
//            if ($user->role === 'Admin') {
//                return back()->with('error', 'Không được xoá chính bạn và Admin !');
//            }
            $user->delete();
            return redirect()->route('users.index')->with('success', 'Đã xoá thành công !');
        }else {
            abort(403);
        }

    }

    public function update($id)
    {
        if (Gate::allows('user-crud')) {
            $user = User::findOrFail($id);
            $roles = Role::all();
            return \view('backend.users.edit', compact('user', 'roles'));
        }else {
            abort(403);
        }

    }
    public function edit(EditUserRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $user = User::findOrFail($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
            $user->roles()->sync($request->role);
            DB::commit();
        }catch (\Exception $exception) {
            DB::rollBack();
        }
        return redirect()->route('users.index')->with('success', 'Update thành công');
    }

    public function showFormChangePassword(){
        return view('backend.users.change-password');
    }


    public function changePassword(Request $request)
    {
        $user = Auth::user();
        $currentPassword = $user->password;
        $request->validate([
            'currentPassword' => 'required',
            'newPassword' => 'required|min:3|different:currentPassword',
            'confirmPassword' => 'required|same:newPassword',

        ]);
        if(!Hash::check($request->currentPassword, $currentPassword)){
            return redirect()->back()->with('error', 'Bạn đã nhập sai mật khẩu!');
        }
        $user->password = Hash::make($request->newPassword);
        $user->save();
        return redirect()->route('users.login')->with('success', 'Đổi password thành công');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

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

}
