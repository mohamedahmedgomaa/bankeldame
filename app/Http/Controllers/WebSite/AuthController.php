<?php

namespace App\Http\Controllers\WebSite;

use App\Http\Controllers\Controller;
use App\Mail\ResetPassword;
use App\Models\Category;
use App\Models\Client;
use App\Models\DonationRequest;
use App\Models\Governorate;
use App\Models\Post;
use App\Models\Setting;
use foo\bar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{

    public function register()
    {
        $settings = Setting::first();
        $governorates = Governorate::all();
        //dd($governorates);
        return view('websites.auth.register',compact('settings','governorates'));
    }

    public function registerClient(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:clients',
            'number_phone' => 'required|unique:clients',
            'password' => 'required',
            'date_of_birth' => 'required',
            'brood_type_id' => 'required',
            'city_id' => 'required',
            'governorate_id' => 'required',
            'last_donation_data' => 'required',
        ], [
            'name.required' => 'يجب كتابه الاسم',
            'email.required' => 'يجب كتابه الايميل',
            'number_phone.required' => 'يجب كتابه رقم الهاتف',
            'password.required' => 'يجب كتابه الرقم السرى',
            'date_of_birth.required' => 'يجب كتابه تاريخ الميلاد',
            'brood_type_id.required' => 'يجب كتابه فصيلة الدم',
            'city_id.required' => 'يجب اختيار المدينه',
            'governorate_id.required' => 'يجب اختيار المحافظه',
            'last_donation_data.required' => 'يجب كتابة او اختيار اخر تاريخ للتبرع بالدم',
        ]);

        $request->merge(['password'=>bcrypt($request->password)]);
        $client = Client::create($request->all());
        $client->api_token = str_random(60);
        $client->save();
        flash()->success("تم انشاء الحساب بنجاح");
        return redirect(route('welcome.index'));
    }



    public function getLogin()
    {
        $settings = Setting::first();
        return view('websites.auth.login',compact('settings'));
    }
//
//    public function login(Request $request)
//    {
//        $validator = validator()->make($request->all(), [
//            'number_phone' => 'required',
//            'password' => 'required',
//        ]);
//
//        $client = Client::where('number_phone',$request->number_phone)->first();
//        if ($client) {
//            if (Hash::check($request->password, $client->password)) {
//                return view('welcome');
//            } else {
//                return view('websites.auth.login');
//            }
//        } else {
//            return view('websites.auth.login');
//        }
//    }

    public function checklogin(Request $request)
    {
        $rememberme = request('rememberme') == 1 ? true : false;
        if (auth()->guard('client')->attempt(['number_phone' => request('number_phone'), 'password' => request('password')], $rememberme)) {
            return redirect('/');
        } else {
            return back()->with('error', 'Wrong Login Details');
        }
//        $this->validate($request, [
//           'number_phone' => 'required',
//           'password' => 'required',
//        ]);
//        $client = Client::where('number_phone',$request->number_phone)->first();
//        if ($client) {
//            if (Hash::check($request->password, $client->password)) {
//                return redirect('/');
//            } else {
//                return back()->with('error', 'Wrong Login Details');
//            }
//        } else {
//            return back()->with('error', 'Wrong no Client Details');
//        }
    }

    public function logout()
    {
        auth()->guard('client')->logout();
        return redirect('/');
    }

    public function reset()
    {
        $settings = Setting::first();
        return view('websites.auth.reset',compact('settings'));
    }

    public function resetPassword(Request $request) {
        $this->validate($request, [
            'email' => 'required',
        ]);

        $user = Client::where('email',$request->email)->first();
//        dd($user);
        if ($user) {
            $code = rand(1111, 9999);
//            $code = random_int(1111, 9999);
            $update = $user->update(['pin_code' => $code]);
//            dd($user->update(['pin_code' => $code])) ;
            if ($update) {

                Mail::to($user->email)
                    ->bcc('mido.15897@gmail.com')
                    ->send(new ResetPassword($code));
                return redirect()->route('auth.reset');
            } else {
                return back()->with('error', 'Wrong Email Details');
            }
        } else {
            return back()->with('error', 'Wrong Email Details');
        }

    }

    public function newPassword()
    {
        $settings = Setting::first();
        return view('websites.auth.newPassword',compact('settings'));
    }

    public function postNewPassword(Request $request) {
        $this->validate($request, [
            'pin_code' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed',
        ]);

        $user = Client::where('pin_code',$request->pin_code)->where('pin_code', '!=' , 0)
            ->where('email',$request->email)->first();
        if ($user) {
            $user->password = bcrypt($request->password);
            $user->pin_code = null;

            if ($user->save())
            {
                return redirect()->route('welcome.index');
            } else {
                return back()->with('error', 'Wrong email Or Code Or Password Details');
            }
        } else {
            return back()->with('error', 'Wrong email Or Code Or Password Details');
        }
    }
}
