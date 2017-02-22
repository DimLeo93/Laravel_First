<?php 

namespace App\Http\Controllers;

use Input;
use Validator;
use Redirect;
use Session;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ApplyController extends Controller {
public function upload(Request $request) {
		
	 $validator = Validator::make($request->all(), [
		    'firstname' => 'required|max:50',
            'lastname' => 'required|max:50',
            'username' => 'required|max:50',
			'email' => 'required',
			'password' => 'required'
		
        ]);
		
		if ($validator->fails()) {
            return redirect('/home')
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
}