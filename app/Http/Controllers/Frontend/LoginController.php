<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function adminLogin()
    {
        return view('login.adminlogin');
    }

    public function adminLoginAuth (Request $request)
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

    public function employeeLoginAuth (Request $request)
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
        if (auth()->attempt(['email' => $request->email, 'password' => $request->password,])) {  //attempt method use kore user ke authenticate kora hocche. eta true return korbe jodi email and password thik thake.
            return redirect('/customer/dashboard'); 

        } else {
            return redirect()->back(); 
        }
    }

    
}
