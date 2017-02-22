@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Update User
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- Update User Form -->
                    <form action="{{ url('user/update')}}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}
                        <!-- User ID Hidden -->
                        <div class="form-group">
                            <label for="user-id" class="col-sm-3 control-label"></label>
                            <div class="col-sm-6">
                                <input type="hidden" name="id" id="user-id" class="form-control" value="{{$user->id  or ""}} ">
                            </div>
                        </div>
                        <!-- User Name -->
                        <div class="form-group">
                            <label for="user-name" class="col-sm-3 control-label">User Name</label>

                            <div class="col-sm-6">
							   <input type="text" name="username" id="user-name" class="form-control" value="{{$user->username or ""}}">
                            </div>
                        </div>
						 <!-- User Email -->
                        <div class="form-group">
                            <label for="user-email" class="col-sm-3 control-label">User Email</label>

                            <div class="col-sm-6">
                                <input type="email" name="email" id="user-email" class="form-control" value="{{$user->email or ""}}">
                            </div>
                        </div>
						 <!-- User Password -->
                        <div class="form-group">
                            <label for="user-password" class="col-sm-3 control-label">User Password</label>

                            <div class="col-sm-6">
                                <input type="password" name="password" id="user-password" class="form-control">
                            </div>
                        </div>	
                        <!-- First Name -->
                        <div class="form-group">
                            <label for="first-name" class="col-sm-3 control-label">First Name</label>

                            <div class="col-sm-6">
							   <input type="text" name="firstname" id="first-name" class="form-control" value="{{$user->fname or ""}}">
                            </div>
                        </div>
                        <!-- Last Name -->
                        <div class="form-group">
                            <label for="last-name" class="col-sm-3 control-label">Last Name</label>

                            <div class="col-sm-6">
							   <input type="text" name="lastname" id="last-name" class="form-control" value="{{$user->lname or ""}}">
                            </div>
                        </div>						
                        <!-- Update User Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Update User
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
