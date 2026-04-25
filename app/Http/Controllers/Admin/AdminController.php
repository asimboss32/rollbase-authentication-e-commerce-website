<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.admin-dashboard');
    }

    public function adminLogout()
    {
        Auth()->logout(); //eta user ke logout korbe.
        return redirect('/admin/login'); //logout er por Login page e niye jabe.
    }
}
