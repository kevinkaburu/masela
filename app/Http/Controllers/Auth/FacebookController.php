<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Socialite;
use Auth;
use Exception;

class FacebookController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToFacebook() {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleFacebookCallback(Request $request) {
        try {

            $user = Socialite::driver('facebook')->user();

            $finduser = User::where('facebook_id', $user->id)->first();

            if ($finduser) {

                Auth::login($finduser);

                return redirect('/home');
            } else {
                $newUser = new User;

                $newUser->name = $user->name;
                $newUser->email = $user->email;
                $newUser->facebook_id = $user->id;
                $newUser->password = encrypt('V!nurUFB-login');
                $newUser->profile_photo_url = $user->avatar;
                $newUser->save();

                $finduser = User::where('facebook_id', $user->id)->first();
                Auth::login($finduser);
                //Auth::login($newUser);

                return redirect('/home');
            }
        } catch (Exception $e) {
            \Illuminate\Support\Facades\Log::info("Error on facebook auth::: -> ".$e);
            return redirect('/auth/facebook');
        }
    }

}
