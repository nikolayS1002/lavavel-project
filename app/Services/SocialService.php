<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\Social;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Contracts\User as BaseContract;

class SocialService implements Social
{

    /**
     * @param BaseContract $socialUser
     * @param string $network
     * @return string
     * @throws \Exception
     */
    public function loginUser(BaseContract $socialUser, string $network): string
    {
        $user = User::where('email', $socialUser->getEmail())->first();
        if ($user) { // update
            $user->name = $socialUser->getName();
            $user->avatar = $socialUser->getAvatar();

            if($user->save()) {
                \Auth::loginUsingId($user->id);
                return route('account');
            } else {
                // register
                $user = User::create([
                    'name' => $socialUser->getName(),
                    'name' => $socialUser->getEmail(),
                    'avatar' => $socialUser->getAvatar(),
                    'password' => 12345678
                ]);
                if ($user){
                    Auth::login($user);
                    return route('account');
                } else {
                    return route('register');
                }

            }

            throw new \Exception("You get error with network: " . $network);
        }
    }
}
