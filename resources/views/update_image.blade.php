@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                   Update Image
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- Update image Form -->
                    <form action="{{ url('user/update_image')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <!-- User ID Hidden -->
                        <div class="form-group">
                            <label for="user-id" class="col-sm-3 control-label"></label>
                            <div class="col-sm-6">
                                <input type="hidden" name="id" id="user-id" class="form-control" value="<?php echo $user->id;?>">
                            </div>
                        </div>
						 <!-- User Image -->
                        <div class="form-group">
                            <label for="image" class="col-sm-3 control-label">User Image</label>

                            <div class="col-sm-6">
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                        </div>				

                        <!-- Add User Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Update Photo
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
