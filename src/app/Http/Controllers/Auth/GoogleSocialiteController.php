<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use App\Models\User;
use Exception;

class GoogleSocialiteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
       
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleCallback()
    {
        try {
     
            // Get Google User
            $user = Socialite::driver('google')->user();
            // Validate If exists
            $finduser = User::where('email', $user->email)->first();
      
            if($finduser){
      
                // Update Avatar
                $finduser->fill([
                    'avatar' => $user->avatar
                ]);
                $finduser->save();
                // Login
                Auth::login($finduser);
                return redirect('/dashboard');
      
            }else{
                return view('auth.error-google-login');
                // $newUser = User::create([
                //     'name' => strtok($user->name, " "),
                //     'last_name' => substr(strstr($user->name," "), 1),
                //     'email' => $user->email,
                //     'password' => encrypt('password'),
                //     'avatar' => $user->avatar,
                // ]);
     
                // Auth::login($newUser);
      
                return redirect('/dashboard');
            }
     
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
