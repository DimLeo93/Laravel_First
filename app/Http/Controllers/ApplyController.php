<?php 

namespace App\Http\Controllers;

use Input;
use Validator;
use Redirect;
use Session;
use App\User;
use Illuminate\Http\Request;

class ApplyController extends Controller {
public function upload(Request $request) {
		
	 $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
			'email' => 'required|email|unique:users,email',
			'password' => 'required|max:50',
			'image' => 'required'
        ]);
		
		if ($validator->fails()) {
            return redirect('/user')
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
				  // sending back with message
				  $user = new User;
				  $user->name = $request->name;
				  $user->email = $request->email;
				  $user->password = $request->password;
				  if ($request->hasFile('image')) {
					  $user->user_image = $request->file('image')->getClientOriginalName();
				  }
				  $user->save();
				  Session::flash('success', 'Upload successfully'); 
				  return Redirect::to('/');
			}
			else {
			  // sending back with error message.
			  Session::flash('error', 'uploaded file is not valid');
			  //return Redirect::to('user');
			}
  }
			
}
}