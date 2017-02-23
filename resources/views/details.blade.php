@extends('layouts.app')

@section('content')

    <div class="container">
    <!-- Current User -->
     <div class=box>
               	<div class="form-box">
	                 <div class="form-top">
	                    <div class="form-top-left">
	                        <h3>Details for {{$user->username}}</h3>
	                      </div>
	                  </div>
        
             <div class="table-div">
                <table class="table">
                    <thead>
                        <th>Photo</th>
                        <th>Username</th>
                        <th>Email Address</th>
                        <th>First Name</th>
                        <th>Last Name</th>                               
                    </thead>
                    <tbody>
                            <tr>
                                <?php 
                                if($user->user_image == NULL){
                                        $image = 'default.jpg';
                                }
                                else{
                                    $image = $user->user_image ;
                                }
                                ?>
                                <td><div> <img src="{{URL::asset('uploads/'.$image )}}" alt="profile Pic" height="60" width="60"></div></td>        
                                <td><div>{{$user->username}}</div></td>
                                <td><div>{{$user->email}}</div></td>
                                <td><div>{{$user->fname}}</div></td>
                                <td><div>{{$user->lname}}</div></td>
                                <!-- Update Button -->										
                                <td>
                                    <form action="{{ url('user/update/'.$user->id) }}" method="GET">
                                        {{ csrf_field() }}

                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-btn fa-trash"></i>Update Info
                                        </button>
                                    </form>
                                </td>		
                                <!-- User Delete Button -->
                                <td>
                                    <form action="{{ url('user/delete/'.$user->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-btn fa-trash"></i>Delete
                                        </button>
                                    </form>
                                </td>			
                            </tr>
                    </tbody>
                </table>
              </div>
            </div>
            </div>
        </div>
      </div>  
    </div>

@endsection















