@extends('layouts.app')

@section('content')

    <div class="container">
            <!-- Current Users -->
				<div class="form-box">
					<div class="form-bottom">
						<form action="" method="GET">
							<input type="text" name="search" value="" id="search"/>
							<button type"submit">Search</button>
						</form>
						</div>
					</div>
            @if (count($users) > 0)
            <div class="form-box2">
	                 <div class="form-top">
	                    <div class="form-top-left">
	                        <h3>Current Users</h3>
	                      </div>
	                  </div>

                <div>
               	<div class="table-div">
                        <table class="table">
                            <thead>
                                <th>Photo</th>                        
                                <th>Username</th>
								<th>Email Address</th>
                                <th>First Name</th>
								<th>Last Name</th>								
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <?php 
                                        if($user->user_image == NULL){
                                                $image = 'default.jpg';
                                        }
                                        else{
                                            $image = $user->user_image ;
                                        }
                                        ?>
                                        <td><div> <img src="{{URL::asset('uploads/'.$image )}}" alt="profile Pic" height="45" width="45"></div></td>        
                                        <td><div>{{ $user->username }}</div></td>
                                        <td><div>{{ $user->email }}</div></td>
                                        <td><div>{{ $user->fname }}</div></td>
                                        <td><div>{{ $user->lname }}</div></td>
										<!-- Update Info Button -->										
                                        <td>
                                            <form action="{{ url('user/update/'.$user->id) }}" method="GET">
                                                {{ csrf_field() }}

                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-btn fa-trash"></i>Update Info
                                                </button>
                                            </form>
                                        </td>	
                                        <!-- Update Image Button -->	
                                        <td>
                                            <form action="{{ url('user/update_image/'.$user->id) }}" method="GET">
                                                {{ csrf_field() }}

                                                <button type="submit" class="btn btn-default">
                                                    <i class="fa fa-btn fa-trash"></i>Update Photo
                                                </button>
                                            </form>
                                        </td>	
                                        <!-- Details Button -->										
                                        <td>
                                            <form action="{{ url('user/details/'.$user->id) }}" method="GET">
                                                {{ csrf_field() }}

                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-btn fa-trash"></i>Get Details
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
                                @endforeach
                            </tbody>
                        </table>
                    {{ $users->render() }}
                  </div>
                </div>
                </div>
            @endif
        </div>
@endsection
