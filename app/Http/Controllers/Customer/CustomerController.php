<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
     public function dashboard()
    {
        return view('customer.customer-dashboard');
    }

    public function customerLogout()
    {
        Auth()->logout(); //eta user ke logout korbe.
        return redirect('/customer/login'); //logout er por Login page e niye jabe.
    }
}
