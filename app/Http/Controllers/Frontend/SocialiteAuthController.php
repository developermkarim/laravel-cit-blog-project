<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SocialiteAuthController extends Controller
{
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookRedirect()
{
    $user = Socialite::driver('facebook')->user();
        
    // Check if the user exists in your database
    $existingUser = User::where('email', $user->email)->first();

    if ($existingUser) {
        Auth::login($existingUser);
        return redirect('/');
    } else {
        // Create a new user and login
        $newUser = new User();
        $newUser->name = $user->name;
        $newUser->email = $user->email;
        $newUser->password = bcrypt(Str::random(16)); // Set a random password
        $newUser->save();
        $newUser->assignRole('Editor');
        Auth::login($newUser);
        return redirect('/');
}

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

$newUser->assignRole('Editor');

Auth::login($newUser);
return redirect('/');

}

public function redirectToGoogle()
{
    return Socialite::driver('google')->redirect();
}


public function handleGoogleRedirect()
{
    $user = Socialite::driver('google')->stateless()->user();

    $googleNewUser = User::updateOrCreate(
        [
            'email'=>$user->email,
        ],
        [
            'name'=>$user->name,
            'email'=>$user->email,
            'password'=>Hash::make($user->password),
        ]
    );
    $googleNewUser->assignRole('Reporter');
    Auth::login($googleNewUser);
    return redirect('/');
}

}
