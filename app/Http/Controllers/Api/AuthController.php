<?php

namespace App\Http\Controllers\Api;

use App\Mail\ResetPassword;
use App\Models\Client;
use App\Token;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    //
    public function register(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:clients',
            'date_of_birth' => 'required',
            'city_id' => 'required',
            'number_phone' => 'required',
            'last_donation_data' => 'required',
            'password' => 'required|confirmed',
            'brood_type_id' => 'required',
        ]);
        if ($validator->fails()) {
            return responseJson(0,$validator->errors()->first(), $validator->errors());
        }

        $request->merge(['password'=>bcrypt($request->password)]);
        $client = Client::create($request->all());
        $client->api_token = str_random(60);
        $client->save();
        return responseJson(1, 'تمت الاضافه بنجاح', [
            'api_token' => $client->api_token,
            'client' => $client
        ]);
    }

    public function login(Request $request) {
        $validator = validator()->make($request->all(), [
            'number_phone' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return responseJson(0,$validator->errors()->first(), $validator->errors());
        }
        $client = Client::where('number_phone',$request->number_phone)->first();
        if ($client) {
            if (Hash::check($request->password, $client->password)) {
                return responseJson(1,'تم تسجيل الدخول', [
                    'api_token' => $client->api_token,
                    'client' =>$client
                ]);
            } else {
                return responseJson(0,'بيانات الدخول غير صحيحه');
            }
        } else {
            return responseJson(0,'بيانات الدخول غير صحيحه');
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function resetPassword(Request $request) {
        $validator = validator()->make($request->all(), [
            'number_phone' => 'required',
        ]);
        if ($validator->fails()) {
            return responseJson(0,$validator->errors()->first(), $validator->errors());
        }
        $user = Client::where('number_phone',$request->number_phone)->first();
        if ($user) {
            $code = rand(1111, 9999);
//            $code = random_int(1111, 9999);
            $update = $user->update(['pin_code' => $code]);
//            dd($user->update(['pin_code' => $code])) ;
            if ($update) {

            Mail::to($user->email)
                ->bcc('mido.15897@gmail.com')
                ->send(new ResetPassword($code));
                return responseJson(1,'برجاء فحص هاتفك', ['pin_code_for_test' => $code]);
            } else {
                return responseJson(0,'حدث خطا . حاول مره اخرى');
            }
        } else {
            return responseJson(0,'بيانات الدخول غير صحيحه');
        }

    }

    public function newPassword(Request $request) {
        $validator = validator()->make($request->all(), [
            'pin_code' => 'required',
            'number_phone' => 'required',
            'password' => 'required|confirmed',
        ]);
        if ($validator->fails()) {
            return responseJson(0,$validator->errors()->first(), $validator->errors());
        }
        $user = Client::where('pin_code',$request->pin_code)->where('pin_code', '!=' , 0)
                ->where('number_phone',$request->number_phone)->first();
        if ($user) {
            $user->password = bcrypt($request->password);
            $user->pin_code = null;

            if ($user->save())
            {
                return responseJson(1, 'تم تغيير كلمه المرور بنجاح');
            } else {
                return responseJson(0, 'حدث خطا . حاول مره اخرى');
            }
        } else {
            return responseJson(1, 'هذا الكود غير صحيح');
        }
    }

    public function registerToken(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'token' => 'required',
            'platform' => 'required|in:android,ios',
        ]);
        if ($validator->fails()) {
            return responseJson(0, $validator->errors()->first(), $validator->errors());
        }
        Token::where('token', $request->token)->delete();
        $request->user()->tokens()->create($request->all());
        return responseJson(1,'تم التسجيل بنجاح');
    }

    public function removeToken(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'token' => 'required',
        ]);
        if ($validator->fails()) {
            return responseJson(0, $validator->errors()->first(), $validator->errors());
        }

        Token::where('token', $request->token)->delete();

        return responseJson(1,'تم الحذف بنجاح');
    }
}
