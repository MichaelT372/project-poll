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
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from the provider.
     *
     * @return Response
     */
    public function handleProviderCallback(SocialAccountService $service, $provider)
    {
        $user = $service->createOrGetUser(Socialite::driver($provider));

        \Auth::login($user, true);

        return redirect()->to('/home');
    }
}
