<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Validator, Redirect, Auth; 
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

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
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
public function login()
{
// validate the info, create rules for the inputs
$rules = array(
    'username' => 'required', // make sure the email is an actual email
    'password' => 'required' // password can only be alphanumeric and has to be greater than 3 characters
);

// run the validation rules on the inputs from the form
$validator = Validator::make(Input::all(), $rules);

// if the validator fails, redirect back to the form
if ($validator->fails()) {
    return Redirect::to('login')
        ->withErrors($validator) // send back all errors to the login form
        ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
} else {

    // create our user data for the authentication
    $userdata = array(
        'username'     => Input::get('username'),
        'password'  => Input::get('password')
    );

    // attempt to do the login
    if (Auth::attempt(['username'=> Input::get('username'), 'password' => Input::get('password') ])) {

        // validation successful with email!
		return redirect('/home');
    }
    elseif(Auth::attempt(['email'=> Input::get('username'), 'password' => Input::get('password') ])){

        // validation successful with username!
        return redirect('/home');
    }
    else { 

        // validation not successful, send back to form 
        return Redirect::to('login');

    }

}
}

public function logout(){
	Auth::logout();
	return  Redirect::to('/');

}




}
