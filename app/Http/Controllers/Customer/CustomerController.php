<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
     public function dashboard()
    {
       $allOrders = Order::where('user_id', Auth::user()->id)->count();
        $pendingOrders = Order::where('user_id', Auth::user()->id)->where('status', 'pending')->count();
        $confirmedOrders = Order::where('user_id', Auth::user()->id)->where('status', 'confirmed')->count();
        $deliveredOrders = Order::where('user_id', Auth::user()->id)->where('status', 'delivered')->count();
        $returnedOrders = Order::where('user_id', Auth::user()->id)->where('status', 'returned')->count();
        $cancelledOrders = Order::where('user_id', Auth::user()->id)->where('status', 'cancelled')->count();
        return view('customer.customer-dashboard', compact('allOrders', 'pendingOrders', 'confirmedOrders',
        'deliveredOrders', 'returnedOrders', 'cancelledOrders'));
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
  public function customerOrders($status)
  {
        if($status == 'all'){
            $orders = Order::with('orderDetails')->orderBy('id', 'desc')->where('user_id', Auth::user()->id)->get();
        }
        else{
            $orders = Order::with('orderDetails')->orderBy('id', 'desc')->where('status',$status)->where('user_id', Auth::user()->id)->get();
        }
    return view('customer.orders.list', compact('orders'));
  }
  public function customerOrderCancel($id)
  {
    $order = Order::find($id);

    $order->status = 'canceled';
    $order->save();

    toastr()->success('Order Canceled Successfully');
    return redirect()->back();
  }
}
