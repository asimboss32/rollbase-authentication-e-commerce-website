<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

        if($authUser->image && file_exists('customer/profile/'.basename($authUser->image))){  //jehetu image update korar somoy ager image delete korte hobe tai file_exists diye check kora hocche je image file ta exist kore kina and tarpor unlink diye delete kora hocche.
            unlink('customer/profile/'.basename($authUser->image));
        }

        if(isset($request->image)){
            $image = $request->file('image');
            $imageName = rand().'.'.$image->getClientOriginalExtension();
            $image->move('customer/profile/', $imageName);

            $authUser->image = url('customer/profile/'.$imageName);
        }

         $authUser->save();

         toastr()->success('Profile Updated Successfully');
        return redirect()->back();
    }
    }

    public function customerCredentialsView()
    {
        $authUser = Auth::user(); 
        return view('customer.profile.credentials-view', compact('authUser')); 
    }

    public function customerCredentialsUpdate(Request $request)
    {
        $authUserId = Auth::user()->id; 
        $authUser = User::find($authUserId); 

         $request->validate([
        'old_password' => 'nullable|required_with:new_password',
        'password' => 'nullable|min:8',
    ], [

        'old_password.required_with' => 'Old password is incorrect.',

        'password.min' => 'New password must be at least 8 characters.',
    ]);

        if(isset($request->email)) {
            $authUser->email = $request->email; 
        }

        if(isset($request->old_password) && isset($request->password)) {
            if(Hash::check($request->old_password, $authUser->password)) { //Hash::check diye check kora hocche je user je old password ta diyeche ta current password er sathe mile kina.
                $authUser->password = Hash::make($request->password); //jodi mile tahole new password ta hash kore database e save kora hocche.
            } 
            else {
                toastr()->error('Old password is incorrect'); //jodi old password mile na tahole error message dekhano hocche.
                return redirect()->back();
            }

        }

        $authUser->save();
         Auth::logout();
            toastr()->success('Credentials Updated Successfully. Please login again with your new credentials.');
        toastr()->success('Credentials Updated Successfully');
        return redirect()->back();
    }
}
