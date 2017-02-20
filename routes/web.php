<?php


use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

Route::group(['middleware' => ['web']], function () {
    /**
     * Show User Dashboard
     */
    Route::get('/', function (Request $request) {


        $search = $request->get('search');

        $users = User::where('name', 'like', "%$search%")
            ->orWhere('email', 'like', "%$search%")
            ->paginate(5)
            ->appends(['search' => $search])
        ;

        return view('welcome', compact('users'));
    });
     /**
     * get User Details
     */
    Route::get('/user/details/{id}', function ($id) {
		return view('details', [
            'user' => User::find($id)
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

        return redirect('/');
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
            'name' => 'required|max:50',
			'email' => 'required',
			'password' => 'required|max:50',
        ]);
		
		if ($validator->fails()) {
            return redirect('/')
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
