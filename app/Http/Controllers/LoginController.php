<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Traits\ResponseTrait;
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
    use ResponseTrait;

    public function login(Request $request){
        $credentials = $request->validate([
            'employee_number'   => 'required|exists:users,employee_number',
            'password'          => 'required'
        ]);

        $user = User::where('employee_number', $request->employee_number)->first();

        if(!$user){
            return 'Not Unauthorized';
        }
        if(Auth::attempt($credentials)){
            $token = $user->createToken('token')->plainTextToken;
            return $this->returnResponse($token);
        }
        return 'Unauthorized';
    }
    /**
     * Where to redirect users after login.
     *
     * @var string
     */


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
