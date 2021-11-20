<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginCustomerRequest;
use App\Http\Requests\RegisterCustomerRequest;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    private $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;

    }
        function showFormLogin()
    {
        return view('frontend.login');
    }

    function login(LoginCustomerRequest $request)
    {
        $customer = Customer::all();

        foreach ($customer as $cus)
        if ($cus->email === $request->email && $cus->phone === $request->phone) {
            return redirect()->route('home.index', compact('cus'));
        }
        return back()->with('messenger', 'Email hoặc số điện thoại không chính xác!');
    }

    public function register(RegisterCustomerRequest $request)
    {
        try {
        $customer = new Customer();
        $customer->email = $request->email;
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->save();
        }catch (\Exception $exception) {
            return redirect()->route('customers.login')->with('messenger', 'Email hoặc số điện thoại đã tồn tại  !');        }
//        DB::beginTransaction();
//        try {
//             $this->customer->create([
//                'name' => $request->name,
//                'email' => $request->email,
//                'phone' => $request->password,
//            ]);
//            DB::commit();
//        }catch (\Exception $exception) {
//            DB::rollBack();
//        }
        return redirect()->route('customers.login')->with('success', 'Bạn đã dăng ký thành công !');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('customers.showFormLogin');
    }

}
