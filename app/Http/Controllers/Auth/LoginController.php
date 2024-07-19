<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;


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
   /* protected $redirectTo = RouteServiceProvider::HOME;  */

/*    protected function authenticated(Request $request, $user)
   {
     if($user->id_role == 1){
        return redirect('/home');
     } elseif ($user->id_role == 2){
        return redirect('/approval');
     } else {
        return redirect('/home');
     }
   } */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /* public function __construct()
    {
        $this->middleware('guest')->except('logout');
    } */

    public function logout(Request $request)
     {
         Auth::logout();
         request()->session()->invalidate();
         request()->session()->regenerateToken();
 
         return redirect('/login');
     }

     public function username()
    {
        return 'username';
    }

/*     public function home()
    {
        if (auth()->user()->role == 'admin') {
            return redirect('/home');
        }
        elseif(auth()->user()->role == 'home'){
            return redirect('/approval');
        }
         else{
            return auth()->logout();
        }
    } */

    public function data()
{
  // Setiap user akan memiliki banyak data
  return $this->hasMany('App\Data','empID');
} 
}
