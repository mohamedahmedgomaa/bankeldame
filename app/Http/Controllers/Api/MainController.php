<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use App\Models\City;
use App\Models\Client;
use App\Models\Contact;
use App\Models\DonationRequest;
use App\Models\Governorate;
use App\Models\Notification;
use App\Models\Post;
use App\Models\Setting;
use App\Token;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    //
    public function posts()
    {
        $posts = Post::paginate(10);
        return responseJson(1, 'success', $posts);
    }

    public function post(Request $request)
    {
        $post = Post::find($request->id);
//        $post = $request->user()->posts()->pluck('posts.id')->get();
        return responseJson(1, 'success', $post);
    }

    public function donationRequest(Request $request)
    {
        $donationrequest = DonationRequest::find($request->id);
//        $post = $request->user()->posts()->pluck('posts.id')->get();
        return responseJson(1, 'success', $donationrequest);
    }


    public function searchCategory(Request $request)
    {
        $posts = Post::with('category')->where(function ($post) use ($request) {
            if ($request->input('category_id')) {
                $post->where('category_id', $request->category_id);
            }
            if ($request->input('keyword')) {
                $post->where(function ($posts) use ($request) {
                    $posts->where('title', 'like', '%' . $request->keyword . '%');
                    $posts->orWhere('content', 'like', '%' . $request->keyword . '%');
                });
            }
        })->latest()->paginate(10);
        //dd($posts);
        if ($posts->count() == 0) {
            return responseJson(0, 'Failed');
        }
        return responseJson(1, 'success', $posts);
    }

    public function favourites(Request $request)
    {
//        dd($request->user()->posts()->paginate(10));
        $favourites = $request->user()->posts()->paginate(10);
        return responseJson(1, 'success', $favourites);
    }

    public function toggleFavourites(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'posts' => 'required',
        ]);

        if ($validator->fails()) {
            return responseJson(0, $validator->errors()->first(), $validator->errors());
        }
//        dd($request->post_id);
//        dd($request->user()->posts()->toggle($request->user()->posts()->post_id));
        $favourites = $request->user()->posts()->toggle($request->posts);
        return responseJson(1, 'success', $favourites);
    }


    public function getNotificationSettings(Request $request)
    {
//        dd($request->user()->governorates()->pluck('governorates.id')->toArray());
        $bloodtype = $request->user()->bloodtypes()->pluck('blood_types.id')->toArray();
        $governorate = $request->user()->governorates()->pluck('governorates.id')->toArray();
//        $orders = Auth::user()->bloodtypes;
        return responseJson(1, 'success', [
            'bloodtype' => $bloodtype,
            'governorate' => $governorate
        ]);
    }

    public function updateNotificationSettings(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'governorates' => 'required',
            'blood_types' => 'required',
        ]);
        if ($validator->fails()) {
            return responseJson(0, $validator->errors()->first(), $validator->errors());
        }

        $governorate = $request->user()->governorates()->sync($request->governorates);
        $bloodtype = $request->user()->bloodtypes()->sync($request->blood_types);

        return responseJson(1, 'success', [
            'bloodtype' => $bloodtype,
            'governorate' => $governorate
        ]);
    }

//    public function clientPost()
//    {
//        $posts = clients()->posts()->orderBy('id')->all();
//        return responseJson(1, 'success', $posts);
//    }

    public function governorates()
    {
        $governorates = Governorate::paginate(10);
        return responseJson(1, 'success', $governorates);
    }

    public function cities(Request $request)
    {
        $cities = City::where(function ($query) use ($request) {
            if ($request->has('governorate_id')) {
                $query->where('governorate_id', $request->governorate_id);
            }
        })->get();
        return responseJson(1, 'success', $cities);
    }

    public function profileEdit(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:clients,email,' . $request->user()->id,
            'date_of_birth' => 'required',
            'city_id' => 'required',
            'number_phone' => 'required',
            'last_donation_data' => 'required',
            'password' => 'nullable|confirmed',
            'brood_type_id' => 'required',
        ]);
        if ($validator->fails()) {
            return responseJson(0, $validator->errors()->first(), $validator->errors());
        }
//        $request->merge(['password' => bcrypt($request->password)]);
        if (request()->has('password')) {
            $request->merge(['password' => bcrypt($request->password)]);
        }
        $request->user()->update($request->all());

        return responseJson(1, 'تمت التعديل بنجاح', ['client' => $request->user()]);
    }

    public function contactUs(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'number_phone' => 'required',
            'title' => 'required',
            'message' => 'required',
        ]);
        if ($validator->fails()) {
            return responseJson(0, $validator->errors()->first(), $validator->errors());
        }

        $contactus = Contact::create($request->all());
        $contactus->save();
        return responseJson(1, 'تمت الاضافه بنجاح', [
            'contact' => $contactus
        ]);
    }

    public function settings()
    {
        $settings = Setting::paginate(10);
        return responseJson(1, 'success', $settings);
    }

    public function categories()
    {
        $categories = Category::paginate(10);
        return responseJson(1, 'success', $categories);
    }

    public function notifications()
    {
        $notifications = Notification::paginate(10);
        return responseJson(1, 'success', $notifications);
    }

    public function donationRequests()
    {
        $donationRequests = DonationRequest::paginate(10);
        return responseJson(1, 'success', $donationRequests);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createDonationRequests(Request $request)
    {

        $validator = validator()->make($request->all(), [
            'name' => 'required',
            'age' => 'required',
            'brood_type_id' => 'required',
            'number_of_blood_bags' => 'required',
            'hospital_name' => 'required',
            'lat' => 'required',
            'lng' => 'required',
            'city_id' => 'required',
            'number_phone' => 'required',
            'notes' => 'required',
            'client_id' => 'required',
        ]);
        if ($validator->fails()) {
            return responseJson(0, $validator->errors()->first(), $validator->errors());
        }

        $donationRequests = $request->user()->donationrequests()->create($request->all());
//        $donationRequests->client_id = auth()->id();

        // find clients suitable for this donation request
        $clientsIds = $donationRequests->city->governorate
            ->clients()->whereHas('bloodtypes', function ($q) use ($request, $donationRequests) {
//                dd($donationRequests->blood_type_id);
                $q->where('blood_types.id', $donationRequests->brood_type_id);
            })->pluck('clients.id')->toArray();
        $send = null;
        if (count($clientsIds)) {
            $notification = $donationRequests->notifications()->create([
                'title' => 'احتاج متبرع لفصيله',
                'body' => $donationRequests->blood_type . 'محتاج متبرع لفصيلة ',
            ]);

            $notification->clients()->attach($clientsIds);

            $tokens = Token::whereIn('client_id', $clientsIds)->where('token', '!=', null)->pluck('token')->toArray();
            if (count($tokens)) {
                $title = $notification->title;
//                dd($title);
                $body = $notification->body;
//                dd($body);
                $data = [
                    'donation_request_id' => $donationRequests->name
                ];
                $send = notifyByFirebase($title, $body, $tokens, $data);

            }

//            $tokens = $client->tokens()->where('token', '!=', '')
//                ->whereIn('client_id', $clientsIds)->pluck('token')->toArray();
        }
        return responseJson(1, 'تمت الاضافه بنجاح', $send);
    }


}
