@extends('layout.layout')

@section('content')
<div class="container">

	
	      <div class="row">
	      	
	      	<div class="span12">      		
	      		
	      		<div class="widget ">
	      			
	      			<div class="widget-header">
	      				<i class="icon-user"></i>
	      				<h3>Your User</h3>
	  				</div> <!-- /widget-header -->
					
					<div class="widget-content">
								{{Form::open(array('action' => 'HomeController@register','class' => 'form-horizontal'))}}
								<!-- <form id="edit-profile" class="form-horizontal"> -->
									<fieldset>
										<div class="control-group">											
											<label class="control-label" for="username">Program Name</label>
											<div class="controls">
												<input type="text" class="span6" id="username" name="username" value="" required minlength=4>
												<p class="help-block">Your username is for logging in and cannot be changed.</p>
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

