<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use App\User;
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
    protected $redirectTo = '/home';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();
        return $user->token;
        $s=User::where([
            'email' => $user->email,
            'provider' =>'google'])->get();
        if(sizeof($s)==1){
            return redirect()->route('User.Dashboard');   
        }else{
            $user1 = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'phone' => 0000,
                'password' => 0000,
                'provider' => 'google',
                'token'=>$user->token
            ]);
            $user1->roles()->sync([2]);
            return redirect()->route('User.Dashboard');
        } 
        
         
        //return $user->token;
        
    }

    public function redirectToProviderFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from facebook.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallbackFacebook()
    {
        $user = Socialite::driver('facebook')->user();
         $s=User::where([
            'email' => $user->email,
            'provider' =>'facebook'])->get();
            dd($s);
        if(sizeof($s)==1){
            return redirect()->route('User.Dashboard');   
        }else{
            $user1 = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'phone' => 0000,
                'password' => 0000,
                'provider' => 'facebook',
                'token'=>$user->token
            ]);
            $user1->roles()->sync([2]);
            return redirect()->route('User.Dashboard');
            }
        //return $user->name;
    }
}
