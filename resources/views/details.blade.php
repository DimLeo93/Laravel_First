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
                                <th>User Photo</th>
								<th>User Name</th>
                                <th>User Email</th>
                                <th>User Password</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td class="table-text" ><div><?php echo $user->user_image;?></div></td>
                                        <td class="table-text"><div><?php echo $user->name;?></div></td>
                                        <td class="table-text"><div><?php echo $user->email;?></div></td>
                                        <td class="table-text" ><div><?php echo $user->password;?></div></td>                                        
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
