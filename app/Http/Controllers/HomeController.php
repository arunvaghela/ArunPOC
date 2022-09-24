<?php

namespace App\Http\Controllers;

use App\Models\ShortLink;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //call profile data except function
        $this->middleware('auth', ['except'=>['getUserProfile']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $baseUrl = url('/'.Auth::user()->id);
        $checkShortUrl = ShortLink::where('link', $baseUrl)->first();
        if (empty($checkShortUrl)){
            $code = Str::random(6);
            $genrateUrl = ShortLink::create([
                'link' => $baseUrl,
                'code' => $code
            ]);
        }
        $getUrl = ShortLink::where('link', $baseUrl)->first();
        return view('home', compact('getUrl'));
    }

    public function getUserProfile($code){
            $str = url('/').'/';
            $getProfile = ShortLink::where('code', $code)->first();
            $getUserId = Str::replace($str, '', $getProfile->link);
            $getProfileData = User::find($getUserId);
            return view('profile', compact('getProfileData'));
    }
}
