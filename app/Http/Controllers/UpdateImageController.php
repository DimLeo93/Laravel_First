<?php 

namespace App\Http\Controllers;

use Input;
use Validator;
use Redirect;
use Session;
use App\User;
use Illuminate\Http\Request;

class UpdateImageController extends Controller {
public function upload_image(Request $request) {	
	 $validator = Validator::make($request->all(), [
			'image' => 'required'
        ]);
		
		if ($validator->fails()) {
            return redirect('/')
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
				  // saving image name to database
          $user = User::find($request->id);
          $old_image = $user->user_image;
          $user->user_image = $fileName;
          $user->save();
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