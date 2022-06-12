<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse;

class GoogleLoginController extends Controller
{
    /**
     * Redirect the user to the Google authentication page.
     *
     * @return RedirectResponse|\Illuminate\Http\RedirectResponse
     */
    public function login(): RedirectResponse|\Illuminate\Http\RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * @return RedirectResponse|\Illuminate\Http\RedirectResponse
     */
    public function googleCallback(): RedirectResponse|\Illuminate\Http\RedirectResponse
    {
        $user = Socialite::driver('google')->user();

        // check if the users email is already there
        $is_user = User::where('email', $user->getEmail())->first();
        if (!$is_user) {
            // user (email) does not exist
            $saveUser = User::updateOrCreate([
                'google_id' => $user->getId(),
            ], [
                'role' => 'user',
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'password' => Hash::make($user->getName() . '@' . $user->getId())
            ]);
        } else {
            // user (email) already exists
            $saveUser = User::where('email', $user->getEmail())->update([
                'google_id' => $user->getId(),
            ]);
            $saveUser = User::where('email', $user->getEmail())->first();
        }


        Auth::loginUsingId($saveUser->id);

        return redirect()->route('redirects');
    }

}
