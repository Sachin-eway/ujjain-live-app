<?php

namespace App\Http\Controllers;

use App\Models\AppSetting;
use App\Models\ContactInfo;
use Illuminate\Http\Request;

class AppSettingController extends Controller
{
    public function index()
    {
        $appSetting = AppSetting::first();
        $contactSetting = ContactInfo::first();
        return view('app_setting', ['data' => $appSetting , 'contact'=> $contactSetting]);
    }
    public function ContactUpdate(Request $request)
    {
    
            $update = ContactInfo::where('id', $request->id)->update([
                'mobile_no' => $request->number,
                'email' => $request->email,
                'facebook' => $request->facebook,
                'instagram' => $request->instagram,
                'twitter' => $request->twitter,
                'youtube' => $request->youtube,
            ]);
            return 'Update Successfully';
       
    }
    public function update(Request $request)
    {
        $request->validate([
            'application_title' => 'required',
            'meta_keywords' => 'required'
        ]);
        if ($request->logo == null) {
            $update = AppSetting::where('id', $request->id)->update([
                'application_title' => $request->application_title,
                'meta_keywords' => $request->meta_keywords,
            ]);
            return 'hello';
        } else {   
        $image = $request->logo;
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $imagePath = public_path('img/icon');
        $image->move($imagePath, $imageName);

        $update =AppSetting::where('id', $request->id)->update([
            'application_title'=> $request->application_title,
            'meta_keywords'=> $request->meta_keywords,
            'logo'=> $imageName,
        ]);
        return "update";
    }
    }
}
