<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Session;

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

    public function login(Request $request){

        if ($request->isMethod('get')) {
            return view('auth/login');
        }
        if ($request->isMethod('post')) { 
            $email = $request->email;
            $password = $request->password;

            $data = User::where('email',$email)->first();
            if ($data) {
                if(Hash::check($password,$data->password)){
                    Session::put('name',$data->name);
                    Session::put('email',$data->email);
                    Session::put('login',TRUE);
                    return redirect('dashboard');
                }
                else{
                    return redirect('login')->with('alert','Password atau Email, Salah !');
                }
            } else{
                return redirect('login')->with('alert','Password atau Email, Salah!');
            }
        }
    }

}
