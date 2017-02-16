@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <!-- Current Users -->
            @if (count($users) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Current Users
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>User Name</th>
								<th>User Email</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="table-text"><div>{{ $user->name }}</div></td>
                                        <td class="table-text"><div>{{ $user->email }}</div></td>
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
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
