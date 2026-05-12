<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\setting;
use App\Models\WebsitePolicy;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function manageSetting()
    {
        $generalSettins = setting::first();
        return view('admin.settings.website-settings', compact('generalSettins'));
    }

    public function updateSetting(Request $request)
    {
        $websiteSetting = setting::first();
       
        $websiteSetting->phone = $request->phone;
        $websiteSetting->email = $request->email;
        $websiteSetting->address = $request->address;
        $websiteSetting->facebook = $request->facebook;
        $websiteSetting->youtube = $request->youtube;
        $websiteSetting->twitter = $request->twitter;
        $websiteSetting->instagram = $request->instagram;

          if(isset($request->logo)){

            if($websiteSetting->logo && file_exists('admin/settings/'.basename($websiteSetting->logo))){
                unlink('admin/settings/'.basename($websiteSetting->logo));
            }

            $image = $request->file('logo');
            $imageName = rand().'.'.$image->getClientOriginalExtension(); //4347657.jpg
            $image->move('admin/settings', $imageName);

            $websiteSetting->logo = url('admin/settings/'.$imageName); //http://127.0.0.1:8000/admin/settings/4347657.jpg
        }

        if(isset($request->hero_image)){

            if($websiteSetting->hero_image && file_exists('admin/settings/'.basename($websiteSetting->hero_image))){
                unlink('admin/settings/'.basename($websiteSetting->hero_image));
            }

            $imageHero = $request->file('hero_image');
            $imageNameHero = rand().'.'.$imageHero->getClientOriginalExtension(); //4347657.jpg
            $imageHero->move('admin/settings', $imageNameHero);

            $websiteSetting->hero_image = url('admin/settings/'.$imageNameHero); //http://127.0.0.1:8000/admin/settings/4347657.jpg
        }

        $websiteSetting->save();

        toastr()->success('Updated successfully');
        return redirect()->back();
    }

    public function managePolicy()
    {
        $policyData = WebsitePolicy::first();

        return view('admin.settings.website-policy', compact('policyData'));
 
    }

    public function updatePolicy(Request $request)
    {
        $policyData = WebsitePolicy::first();

        $policyData->privacy_policy = $request->privacy_policy;
        $policyData->terms_conditions = $request->terms_conditions;
        $policyData->refund_policy = $request->refund_policy;
        $policyData->payment_policy = $request->payment_policy;
        $policyData->about_us = $request->about_us;

        $policyData->save();

        toastr()->success('Updated successfully');
        return redirect()->back();
    }
}
