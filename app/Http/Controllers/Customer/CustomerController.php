<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\User;
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

    public function customerProfileView()
    {
        $authUser = Auth::user(); //eta current logged in user er information ke $authUser variable e store korbe.
        return view('customer.profile.profile-view', compact('authUser')); //profile-view blade file e $authUser variable ke pathabe.
    }

    public function customerProfileUpdate(Request $request)
    {
        $authUserId = Auth::user()->id; 
        $authUser = User::find($authUserId); 

        $authUser->name = $request->name; 
        $authUser->phone = $request->phone;

         if(isset($request->image)){

        if($authUser->image && file_exists('admin/category/'.basename($authUser->image))){  //jehetu image update korar somoy ager image delete korte hobe tai file_exists diye check kora hocche je image file ta exist kore kina and tarpor unlink diye delete kora hocche.
            unlink('admin/category/'.basename($authUser->image));
        }

        if(isset($request->image)){
            $image = $request->file('image');
            $imageName = rand().'.'.$image->getClientOriginalExtension();
            $image->move('admin/category/', $imageName);

            $authUser->image = url('admin/category/'.$imageName);
        }

         $authUser->save();

         toastr()->success('Profile Updated Successfully');
        return redirect()->back();
    }
    }
}
