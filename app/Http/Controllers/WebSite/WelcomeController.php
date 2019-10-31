<?php

namespace App\Http\Controllers\WebSite;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Contact;
use App\Models\DonationRequest;
use App\Models\Post;
use App\Models\Setting;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function index()
////    {
////        //
////        $posts = Post::paginate(6);
////        $donations = DonationRequest::paginate(6);
////        $settings = Setting::first();
////
////        return view('welcome', compact('posts','donations','settings'));
////    }

    public function index(Request $request)
    {
        $donations = DonationRequest::where(function ($q) use ($request) {
            if ($request->brood_type_id) {
                $q->where('brood_type_id', $request->brood_type_id);
            }
            if ($request->governorate_id) {
                $q->whereHas('city', function ($q2) use ($request) {
                    // search in restaurant region "Region" Model
                    $q2->whereCityId($request->governorate_id);
                });
            }
        })->with('city.governorate')->latest()->paginate(6);
        $posts = Post::paginate(6);
        $settings = Setting::first();
        return view('welcome', compact('donations', 'settings', 'posts'));
    }

    public function howWeAre()
    {
        $settings = Setting::first();
        return view('websites.howWeAre', compact('settings'));
    }

    public function articles()
    {
        $settings = Setting::first();
        $posts = Post::paginate(12);
//        $fav=Client::with('posts')->where('client_id',auth('client')->user()->id)->where('post_id',1);
        return view('websites.articles', compact('settings', 'posts','fav'));
    }

    public function fav(Request $request)
    {
        $favourites = $request->user()->posts()->toggle($request->post_id);
        return responseJson(1,'success',$favourites);
    }

    public function article($id)
    {
        $post = Post::findOrFail($id);
        $settings = Setting::first();
        $posts = Post::where('category_id', $post->category_id)->get();
        return view('websites.article', compact('post','settings', 'posts'));
    }

    public function donations(Request $request)
    {
        $donations = DonationRequest::where(function ($q) use ($request) {
            if ($request->brood_type_id) {
                $q->where('brood_type_id', $request->brood_type_id);
            }
            if ($request->governorate_id) {
                $q->whereHas('city', function ($q2) use ($request) {
                    // search in restaurant region "Region" Model
                    $q2->whereCityId($request->governorate_id);
                });
            }
        })->with('city.governorate')->latest()->paginate(10);
        $posts = Post::paginate(6);
        $settings = Setting::first();
        return view('websites.donations', compact('donations', 'settings', 'posts'));
    }

    public function donationDetails($id)
    {
        $donations = DonationRequest::findOrFail($id);
        $settings = Setting::first();
        return view('websites.donationDetails', compact('donations','settings'));
    }

    public function contact()
    {
        $settings = Setting::first();
        return view('websites.contactUs',compact('settings'));
    }

    public function postContact(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'number_phone' => 'required',
            'title' => 'required',
            'message' => 'required',
        ], [
            'name.required' => 'يجب كتابه الاسم',
            'email.required' => 'يجب كتابه الايميل',
            'number_phone.required' => 'يجب كتابه رقم الهاتف',
            'title.required' => 'يجب كتابه عنوان للرساله',
            'message.required' => 'يجب كتابه الرساله',
        ]);

        $record = Contact::create($request->all());
        flash()->success("تمت الاضافه بنجاح");
        return redirect(route('welcome.contact'));
    }



    public function donationRequest(Request $request)
    {
//        dd(auth()->guard('client')->user()->name);
        $settings = Setting::first();
        return view('websites.donationRequest',compact('settings'));
    }

    public function createDonationRequest(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'age' => 'required',
            'brood_type_id' => 'required',
            'number_of_blood_bags' => 'required',
            'hospital_name' => 'required',
            'lat' => 'sometimes|nullable',
            'lng' => 'sometimes|nullable',
            'city_id' => 'required',
            'number_phone' => 'required',
            'notes' => 'required',
            'client_id' => 'sometimes|nullable'
        ]);

        $record = DonationRequest::create($request->all());
        $record->client_id = auth()->guard('client')->user()->id;
        $record->save();
        flash()->success("تمت الاضافه بنجاح");
        return redirect()->back();
    }

}
