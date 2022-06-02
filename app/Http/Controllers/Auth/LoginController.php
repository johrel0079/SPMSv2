<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
    public function login(Request $request){
        $credentials = $request->validate([
            'employee_number'   => 'required|exists:users,employee_number',
            'password'          => 'required'
        ]);

        $user = User::where('employee_number', $request->employee_number)->first();

        if(!user){
            return $this->errorResponse('Unauthorized');
        }

        if(Auth::attempt($credentials)){
            $token = $user->createToken('token')->plainTextToken;
            return $this->returnResponse($token);
        }
        return $this->errorResponse('Unauthorized');
    }
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
}
