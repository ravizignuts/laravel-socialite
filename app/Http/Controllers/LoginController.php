<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function redirectToProvider(){
        return Socialite::driver('github')->redirect();

    }
    public function handleProviderCallback(Request $request){
        $user = Socialite::driver('github')->user();
        // dd($user);
        $data = User::Create([
            'name'        => $user->name,
            'email'       => $user->email,
            'provider'    => 'Github',
            'provider_id' => $user->id,
        ]);
        Auth::login($data);
        return redirect('home');
        // dd($user);

    }
}
