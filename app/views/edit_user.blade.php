@extends('layout.layout')

@section('content')
<div class="container">

	
	      <div class="row">
	      	
	      	<div class="span12">      		
	      		
	      		<div class="widget ">
	      			
	      			<div class="widget-header">
	      				<i class="icon-user"></i>
	      				<h3>Edit User</h3>
	  				</div> <!-- /widget-header -->
					
					<div class="widget-content">
								{{Form::model($user,array('action' => ['HomeController@update', 'id' => $user->id ],'class' => 'form-horizontal'))}}

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
												{{ Form::text('username',null,array('class' => 'span6','minlength' => 4,'disabled' => 'disabled','required' => 'required'))}}
										<!-- 		<p class="help-block">Your username is for logging in and cannot be changed.</p> -->
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										
										<div class="control-group">											
											<label class="control-label" for="firstname">First Name</label>
											<div class="controls">
												{{ Form::text('first_name',null,array('class' => 'span6','minlength' => 4,'required' => 'required'))}}
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										
										<div class="control-group">											
											<label class="control-label" for="lastname">Last Name</label>
											<div class="controls">
												{{ Form::text('last_name',null,array('class' => 'span6','minlength' => 4,'required' => 'required'))}}
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										
										<div class="control-group">											
											<label class="control-label" for="email">Email Address</label>
											<div class="controls">
													{{ Form::email('email',null,array('class' => 'span6','required' => 'required','disabled' => 'disabled'))}}
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										
							<!-- 			<br /><br />
										
										<div class="control-group">											
											<label class="control-label" for="password1">Password</label>
											<div class="controls">
												<input type="password" class="span4" id="password1" name="password" value="" required  minlength=6>
											</div> 			
										</div> 
										
										
										<div class="control-group">											
											<label class="control-label" for="password2">Confirm</label>
											<div class="controls">
												<input type="password" class="span4" id="password2" name="password_confirmation" value="" required  minlength=6>
											</div> 			
										</div>  -->

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

