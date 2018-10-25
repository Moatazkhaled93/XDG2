<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\User;
use Auth;
use Illuminate\Http\Request;

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



    public  function sociallogin($social){
        return Socialite::driver($social)->redirect();

    }


    public  function  handleProviderCallback( $social ){
        $user=Socialite::driver($social)->stateless()->user();
       $userdata=User::where(['email'=>$user->getEmail()]);

        if(!$userdata){
            Auth::login($userdata);
            return redirect ()->action ('HomeController@index');
        }
        else{
            return view ('auth.register',['name'=>$user->getName()
                                           ,'email'=>$user->getEmail()]);
        }
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
    }








}
