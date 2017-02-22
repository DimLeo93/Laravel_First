<?php


use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


Route::group(['middleware' => 'auth'], function () {



	    /**
     * lala
     */
    Route::get('/', function (Request $request) {


         return redirect('/home');
    });
	
     /**
     * logout
     */
	Route::get('logout', function () {
	Auth::logout();
     return redirect('/');
    });
	
     /**
     * get User Details
     */
    Route::get('/user/details/{id}', function ($id) {
		
		$user = User::find($id);
		return view('details',compact('user'));
    });

	/**
     * Add User Dashboard
     */
    Route::get('/add', function () {
        return view('add');
    });


    Route::post('/add', 'ApplyController@upload'); 

    /**
     * Add New User
     */
    Route::post('/register', 'ApplyController@upload'); 
    
     /**
     * Update User Image
     */
    Route::post('/user/update_image', 'UpdateImageController@upload_image');


  

    /**
     * Delete User
     */
    Route::delete('/user/delete/{id}', function ($id) {
        $user = User::findOrFail($id);
        $image_path = '../uploads/' . $user->user_image;
        File::Delete($image_path);
        User::findOrFail($id)->delete();

        return redirect('/home');
    });
	
    /**
     * get update info page
     */
    Route::get('/user/update/{id}', function ($id) {
		return view('update', [
            'user' => User::find($id)
        ]);
    });


    	
    /**
     * get update image page
     */
    Route::get('/user/update_image/{id}', function ($id) {
		return view('update_image', [
            'user' => User::find($id)
        ]);
    });
	
	
	
     /**
     * post update page
     */
    Route::post('user/update', function (Request $request) {
		
         $validator = Validator::make($request->all(), [
            'username' => 'required|max:50',
			'email' => 'required',
			'password' => 'required|max:50'
        ]);
		
		if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
		$user = User::find($request->id);
		$user->fname = $request->firstname;
		$user->lname = $request->lastname;
		$user->username = $request->username;
		$user->email = $request->email;
		$user->password = Hash::make($request->password);
        $user->save();

        return redirect('/');
    });
	
	Route::get('/home', 'HomeController@index');

});

Auth::routes();

