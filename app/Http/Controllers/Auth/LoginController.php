<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Auth;
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

    public function ajaxlogin(Request $request){
    //     $validator = Validator::make($request->all(), [
    //     'email' =>    'required',
    //     'password' => 'required',
    //   ]);
    //    // validate all requests and it sends output to your login.blade.php
      
    //    if(!$validator->passes()){
    //       return response()->json([
    //          'status'=>0, 
    //          'error'=>$validator->errors()->toArray()
    //       ]);
    //     }
    //     // return 1;
        // $user_cred = $request->only('email', 'password');
        $user_data = array(
            'email'  => $request->post('email'),
            'password' => $request->post('password')
           );
        
           if (Auth::attempt($user_data)) {
            return 1;
             //if user is logged in and the role is user
            // if(Auth()->user()->is_admin=='1'){  
            //    return response()->json([ [1] ]);
            // }  

        }else{
            return 0;
             //if user isn't logged in
               return response()->json([ [2] ]);
        }
        return redirect("/");
     }

}
