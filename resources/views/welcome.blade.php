@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm col-sm-12">
            <!-- Current Users -->
            @if (count($users) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Current Users
                    </div>
                    <div class="panel-body">
                    <form action="" method="GET">
                        <input type="text" name="search" value=""/>
                        <button type"submit">Search</button>
                    </form>
                        <table class="table table-striped task-table">
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
                                        <td class="table-text"><div> <img src="{{URL::asset('uploads/'.$image )}}" alt="profile Pic" height="60" width="60"></div></td>        
                                        <td class="table-text"><div>{{ $user->username }}</div></td>
                                        <td class="table-text"><div>{{ $user->email }}</div></td>
                                        <td class="table-text"><div>{{ $user->fname }}</div></td>
                                        <td class="table-text"><div>{{ $user->lname }}</div></td>
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

                                                <button type="submit" class="btn btn-primary">
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
            @endif
        </div>
    </div>
@endsection
