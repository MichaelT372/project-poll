<?php

namespace App\Http\Controllers\Auth;

use Socialite;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\SocialAccountService;
use App\Http\Controllers\Controller;


class OAuthController extends Controller
{
    /**
     * Redirect the user to the authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from the provider.
     *
     * @return Response
     */
    public function handleProviderCallback(SocialAccountService $service)
    {
        $user = $service->createOrGetUser(Socialite::driver('facebook')->user());

        \Auth::login($user, true);

        return redirect()->to('/home');
    }
}
