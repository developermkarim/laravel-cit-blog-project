<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CookieController extends Controller
{
    public function index(Request $request)
    {
         // Check if the user has accepted the cookie policy
         $acceptedCookiePolicy = $request->session()->get('accepted_cookie_policy',false);

         return view('frontend.cookie.cookie',['showCookiePopup'=>!$acceptedCookiePolicy]);
    }

    public function acceptCookiePolicy(Request $request)
    {
        // Set the session variable to indicate that the user has accepted the cookie policy
        $request->session()->put('accepted_cookie_policy', true);
        
        return redirect()->back();
    }
}
