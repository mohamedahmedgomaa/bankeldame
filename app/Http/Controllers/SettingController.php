<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
//        return view('settings.edit');
        return view('settings.edit')->with('settings', Setting::first());
    }


    public function update(Request $request)
    {

        $this->validate($request, [
            'number_phone' => 'required',
            'email' => 'required',
            'google_plus' => 'required',
            'whats_app' => 'required',
            'instagram' => 'required',
            'text' => 'required|nullable',
            'you_tube' => 'required',
            'twitter' => 'required',
            'facebook' => 'required',
            'android_app_url' => 'nullable',
            'logo' => 'nullable|image',
        ]);

        $setting = Setting::first();

        if ( $request->hasFile('logo')  ) {
            $logo = $request->logo;
            $logo_new_name = time() . $logo->getClientOriginalName();
            $logo->move('uploads/setting', $logo_new_name);

            $setting->logo = 'uploads/setting/'.$logo_new_name;
        }
//        if ( $request->hasFile('logo')  ) {
//            $featured = $request->logo;
//            $featured_new_name = time().$featured->getClientOriginalName();
//            $featured->move('uploads/posts/',$featured_new_name);
//
//            $setting->logo = 'uploads/posts/'.$featured_new_name;
//
//        }

        $setting->number_phone = $request->number_phone;
        $setting->email = $request->email;
        $setting->google_plus = $request->google_plus;
        $setting->whats_app = $request->whats_app;
        $setting->text = $request->text;
        $setting->instagram = $request->instagram;
        $setting->you_tube = $request->you_tube;
        $setting->twitter = $request->twitter;
        $setting->facebook = $request->facebook;
        $setting->android_app_url = $request->android_app_url;
        $setting->save();

        flash()->success("تم التعديل بنجاح");
        return redirect()->back();


    }
}
