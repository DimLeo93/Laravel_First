@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <!-- Current User -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Details for {{$user->name}}
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Photo</th>
								<th>Username</th>
                                <th>Email Address</th>
                                <th>Password</th>
                                <th>First Name</th>
                                <th>Last Name</th>                               

                                <th>&nbsp;</th>
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
                                        <td class="table-text"><div> <img src="{{URL::asset('uploads/'.$image )}}" alt="profile Pic" height="60" width="60"></div></td>        
                                        <td class="table-text"><div>{{$user->username}}</div></td>
                                        <td class="table-text"><div>{{$user->email}}</div></td>
                                        <td class="table-text" ><div>{{$user->password}}</div></td> 
                                        <td class="table-text" ><div>{{$user->fname}}</div></td>
                                        <td class="table-text"><div>{{$user->lname}}</div></td>
                                      
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
@endsection
