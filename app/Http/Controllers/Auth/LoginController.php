<?php

namespace App\Http\Controllers\Auth;

use auth;
use App\Models\Prodi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'email' => ['required'],
    //         'password' => ['required'],
    //     ]);
    //     $auth = Auth::attempt(array(
    //         'email'     => Input::get('email'),
    //         'password'  => Input::get('password'),
    //         'active'    => 1
    //     ), $remember);
        
        
        
    // }
    public function login(Request $request){
        $input = $request->all();
        $profil = User::all();
        $prodi = Prodi::all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {

      
         
            if (empty(auth()->user()->nomorhp) && auth()->user()->role == 3 && auth()->user()->status == 1) {
                return redirect(url('dashboard'));
            } elseif (auth()->user()->role == 3 && auth()->user()->status == 0) {
                (auth()->logout());
            } elseif (auth()->user()->role == 1 && auth()->user()->status == 1) {
                return redirect(url('dashboard'));
            } elseif (auth()->user()->role == 1 && auth()->user()->status == 0) {
                (auth()->logout());
            } elseif ( empty(auth()->user()->nomorhp) && auth()->user()->role == 0 && auth()->user()->status == 1) {
                return view('dosen\Profile\editprofile', compact( 'profil' ,'prodi'));
            } elseif ( !empty(auth()->user()->nomorhp) && auth()->user()->role == 0 && auth()->user()->status == 1) {
                return redirect(url('dashboard'));
            } elseif (auth()->user()->role == 0 && auth()->user()->status == 0) {
                (auth()->logout());
            }  elseif (auth()->user()->role == 2 && auth()->user()->status == 1) {
                return redirect(url('dashboard'));
            } elseif (auth()->user()->role == 2 && auth()->user()->status == 0) {
                (auth()->logout());
           
            }
        } else {
            return redirect()->route('login')->with('error', 'Email and password are wrong');
        }
        
    }
}
