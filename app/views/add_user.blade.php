@extends('layout.layout')

@section('content')
<div class="container">

	
	      <div class="row">
	      	
	      	<div class="span12">      		
	      		
	      		<div class="widget ">
	      			
	      			<div class="widget-header">
	      				<i class="icon-user"></i>
	      				<h3>Add User</h3>
	  				</div> <!-- /widget-header -->
					
					<div class="widget-content">
								{{Form::open(array('action' => 'HomeController@register','class' => 'form-horizontal'))}}

								@if ($errors->has())
									<div class="alert alert-danger">
										@foreach ($errors->all() as $error)
											{{ $error }}<br>        
										@endforeach
									</div>
								@endif
								<!-- <form id="edit-profile" class="form-horizontal"> -->
									<fieldset>
										<div class="control-group">											
											<label class="control-label" for="username">Username</label>
											<div class="controls">
												<input type="text" class="span6" id="username" name="username" value="{{ Input::old('username') }}" required minlength=4>
												<p class="help-block">Your username is for logging in and cannot be changed.</p>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										
										<div class="control-group">											
											<label class="control-label" for="firstname">First Name</label>
											<div class="controls">
												<input type="text" class="span6" name="first_name" id="firstname" value="{{ Input::old('first_name') }}" required>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										
										<div class="control-group">											
											<label class="control-label" for="lastname">Last Name</label>
											<div class="controls">
												<input type="text" class="span6" id="lastname" name="last_name" value="{{ Input::old('last_name') }}" required>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										
										<div class="control-group">											
											<label class="control-label" for="email">Email Address</label>
											<div class="controls">
												<input type="email" class="span4" id="email" name="email" value="{{ Input::old('email') }}" required>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->

										<div class="control-group">											
											<label class="control-label" for="user_type">User Type</label>
											<div class="controls">
												<!-- <input type="email" class="span4" id="email" name="email" value="{{ Input::old('email') }}" required> -->
												<select name="user_type" id="">
													<option value="staff">Staff</option>
													<option value="admin">Admin</option>
													<option value="donor">Donor</option>
												</select>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										<br /><br />
										
										<div class="control-group">											
											<label class="control-label" for="password1">Password</label>
											<div class="controls">
												<input type="password" class="span4" id="password1" name="password" value="" required  minlength=6>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										
										<div class="control-group">											
											<label class="control-label" for="password2">Confirm</label>
											<div class="controls">
												<input type="password" class="span4" id="password2" name="password_confirmation" value="" required  minlength=6>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->

										<div class="form-actions">
											<button type="submit" class="btn btn-primary">Save</button> 
										</div> <!-- /form-actions -->
									</fieldset>
								</form>
					</div> <!-- /widget-content -->
						
				</div> <!-- /widget -->
	      		
		    </div> <!-- /span12 -->
	      </div> <!-- /row -->
</div>
@stop

