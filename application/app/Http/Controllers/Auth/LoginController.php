<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/#/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except(['redirectToProvider', 'handleProviderCallback']);
    }

    /**
     * Redirect the user to the Google authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $googleUser = Socialite::driver('google')->user();
        if (explode("@", $googleUser->email)[1] !== 'tradebyte.com') {
            return view('welcome', ['error' => 'Only tradebyte.com domain emails allowed to login']);
        }
        $user = User::where('email', $googleUser->email)->first();
        if ($user) {
            auth()->login($user, true);
        } else {
            $user = new User;
            $user->name            = $googleUser->name;
            $user->email           = $googleUser->email;
            $user->save();
            auth()->login($user, true);
        }
        if ($user && Auth::user()) {
            $user->rollApiKey();
            \Illuminate\Support\Facades\Cookie::queue('auth_token', $user->api_token, 100);
            return view('welcome', ['user' => $user]);
        }
        return view('welcome', ['error' => 'Your login attempt not completed!']);
    }
}
