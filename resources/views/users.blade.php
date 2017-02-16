@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New User
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New User Form -->
                    <form action="{{ url('user')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <!-- User Name -->
                        <div class="form-group">
                            <label for="user-name" class="col-sm-3 control-label">User Name</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="user-name" class="form-control" value="{{ old('user') }}">
                            </div>
                        </div>
						 <!-- User Email -->
                        <div class="form-group">
                            <label for="user-email" class="col-sm-3 control-label">User Email</label>

                            <div class="col-sm-6">
                                <input type="email" name="email" id="user-email" class="form-control" value="{{ old('user') }}">
                            </div>
                        </div>
						 <!-- User Password -->
                        <div class="form-group">
                            <label for="user-password" class="col-sm-3 control-label">User Password</label>

                            <div class="col-sm-6">
                                <input type="password" name="password" id="user-password" class="form-control" value="{{ old('user') }}">
                            </div>
                        </div>
						 <!-- User Image -->
                        <div class="form-group">
                            <label for="image" class="col-sm-3 control-label">User Image</label>

                            <div class="col-sm-6">
                                <input type="file" name="image" id="image" class="form-control" value="{{ old('user') }}">
                            </div>
                        </div>				

                        <!-- Add User Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Add User
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
