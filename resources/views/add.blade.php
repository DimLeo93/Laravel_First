@extends('layouts.app')

 <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                	
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>Tripark</strong>.com</h1>
                            <div class="description">
                            	<p>
	                            	The easy way to travel <strong> #tripark</strong> 
                            	</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2">
                        	
                        	<div class="form-box">
	                        	<div class="form-top">
	                        		<div class="form-top-left">
	                        			<h3>Add a new User to the system</h3>
	                            		<p>Fill the form below</p>
	                        		</div>
	                        		<div class="form-top-right">
	                        			<i class="fa fa-lock"></i>
	                        		</div>
	                            </div>
	                    <div class="form-bottom">
						                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New User Form -->
                    <form action="{{ url('add')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <!-- User First Name -->
                        <div class="form-group">
                            <label for="first-name" class="col-sm-3 control-label">First Name</label>

                            <div class="col-sm-6">
                                <input type="text" name="firstname" id="first-name" class="form-control" value="{{ old('user') }}">
                            </div>
                        </div>						
                        <!-- User Last Name -->
                        <div class="form-group">
                            <label for="last-name" class="col-sm-3 control-label">Last Name</label>

                            <div class="col-sm-6">
                                <input type="text" name="lastname" id="last-name" class="form-control" value="{{ old('user') }}">
                            </div>
                        </div>
                        <!-- User UserName -->
                        <div class="form-group">
                            <label for="user-name" class="col-sm-3 control-label">User Name</label>

                            <div class="col-sm-6">
                                <input type="text" name="username" id="user-name" class="form-control" value="{{ old('user') }}">
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
						</div>
						</div>
						</div>
						</div>
