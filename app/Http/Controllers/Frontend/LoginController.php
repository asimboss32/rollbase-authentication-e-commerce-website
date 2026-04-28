<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function adminLogin()
    {
        return view('login.adminlogin');
    }

    public function adminLoginAuth(Request $request)
    {
        if (auth()->attempt(['email' => $request->email, 'password' => $request->password,])) {  //attempt method use kore user ke authenticate kora hocche. eta true return korbe jodi email and password thik thake.
            return redirect('/admin/dashboard');
        } else {
            return redirect()->back();  // email password thik na thakle abar login page e niye jabe.
        }
    }

    public function employeeLogin()
    {
        return view('login.employeelogin');
    }

    public function employeeLoginAuth(Request $request)
    {
        if (auth()->attempt(['email' => $request->email, 'password' => $request->password,])) {  //attempt method use kore user ke authenticate kora hocche. eta true return korbe jodi email and password thik thake.
            return redirect('/employee/dashboard');
        } else {
            return redirect()->back();
        }
    }

    public function customerLogin()
    {
        return view('login.customerlogin');
    }

    public function customerLoginAuth (Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            if(Auth::user()->role == 'customer'){
                return redirect('/customer/dashboard');
            }
            else{
                $role = Auth::user()->role;
                Auth::logout();
                if($role == 'admin'){
                    return redirect('/admin/login');
                }
                elseif($role == 'employee'){
                    return redirect('/employee/login');
                }
            }
        }
        else{
            return redirect()->back();
        }
    }


    public function customerRegistration()
    {
        return view('login.customerregistration');
    }

    public function customerRegistrationStore(Request $request)
    {
        $customer = new User();

        $customer->name = $request->name;
         $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->password = Hash::make($request->password); //password ke hash kore database e store kora hocche.
        $customer->role = 'customer';

        $customer->save();

        toastr()->success('Account created successfully');
        return redirect('customer/login');


    }
}
