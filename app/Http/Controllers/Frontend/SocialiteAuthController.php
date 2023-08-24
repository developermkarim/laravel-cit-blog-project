<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SocialiteAuthController extends Controller
{
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
{
    $user = Socialite::driver('facebook')->user();
    // Handle user authentication and data storage
}


/*  Auth with Github */

public function redirectToGithub()
{
    return Socialite::driver('github')->redirect();
}

public function handleGithubCallback()
{
$user =  Socialite::driver('github')->user();
// Handle user authentication and data storage
$newUser = User::UpdateOrCreate(
    ['email'=>$user->email],
    [
        'name'=>$user->name,
        'email'=>$user->email,
        'password'=>Hash::make($user->password),
    ]
);

$newUser->assignRole('editor');

Auth::login($newUser);
return redirect('/');

}


}
