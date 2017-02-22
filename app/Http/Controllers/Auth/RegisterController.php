<?php

namespace App\Http\Controllers\Auth;

use Input;
use Validator;
use Redirect;
use Session;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\RegistersUsers;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }
	
	public function showRegistrationForm()
	 {
        return view('register');
    }

    public function register(Request $request) {
            
        $validator = Validator::make($request->all(), [
                'firstname' => 'required|max:50',
                'lastname' => 'required|max:50',
                'username' => 'required|max:50',
                'email' => 'required',
                'password' => 'required'
            
            ]);
            
            if ($validator->fails()) {
                return redirect('/register')
                    ->withInput()
                    ->withErrors($validator);
            }
            else {
                // checking file is valid.
                if ($request->hasFile('image')) {
                    $destinationPath = 'uploads'; // upload path
                    $extension = $request->image->getClientOriginalExtension(); // getting image extension
                    $fileName = rand(11111,99999).'.'.$extension; // renameing image
                    $request->image->move($destinationPath, $fileName); // uploading file to given path  
                }
                else {
                // sending back with error message.
                Session::flash('error', 'uploaded file is not valid');
                //return Redirect::to('user');
                }
                $user = new User;
                $user->fname = $request->firstname;
                $user->lname = $request->lastname;
                $user->username = $request->username;
                $user->email = $request->email;
                $user->password = Hash::make($request->password);
                if ($request->hasFile('image')) {
                    $user->user_image = $fileName;
                }
                $user->save();
                Session::flash('success', 'Upload successfully'); 
                return Redirect::to('/home');
             }           
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}




