<?php


use App\User;
use Illuminate\Http\Request;

Route::group(['middleware' => ['web']], function () {
    /**
     * Show User Dashboard
     */
    Route::get('/', function () {
        return view('welcome', [
            'users' => User::orderBy('created_at', 'asc')->get()
        ]);
    });
	/**
     * Add User Dashboard
     */
    Route::get('/add', function () {
        return view('users', [
            'users' => User::orderBy('created_at', 'asc')->get()
        ]);
    });

    /**
     * Add New User
     */
    Route::post('/user', 'ApplyController@upload');
  

    /**
     * Delete User
     */
    Route::delete('/user/delete/{id}', function ($id) {
        User::findOrFail($id)->delete();

        return redirect('/');
    });
	
    /**
     * redirect to update page
     */
    Route::get('/user/update/{id}', function ($id) {
		return view('update', [
            'user' => User::find($id)
        ]);
    });
	
	
	
	    /**
     * Update User
     */
    Route::post('user/update', function (Request $request) {
		
         $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
			'email' => 'required|email|unique:users,email',
			'password' => 'required|max:50',
        ]);
		
		if ($validator->fails()) {
            return redirect('/user/update')
                ->withInput()
                ->withErrors($validator);
        }
		$user = User::find($request->id);
        $user->name = $request->name;
	    $user->email = $request->email;
	    $user->password = $request->password;
        $user->save();

        return redirect('/');
    });
	
});
