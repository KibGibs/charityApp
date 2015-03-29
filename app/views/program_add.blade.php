@extends('layout.layout')

@section('content')
<div class="container">

	
	      <div class="row">
	      	
	      	<div class="span12">      		
	      		
	      		<div class="widget">
	      			
	      			<div class="widget-header">
	      				<i class="icon-calendar"></i>
	      				<h3>Add Program</h3>
	  				</div> <!-- /widget-header -->
					
					<div class="widget-content">
						{{Form::open(array('action' => 'ProgramController@saveProgram','class' => 'form-horizontal'))}}
						<!-- <form id="edit-profile" class="form-horizontal"> 
							<input type="hidden" value="" name="id"/>-->
							<fieldset>
								<div class="control-group">											
									<label class="control-label" for="username">Name</label>
									<div class="controls">
										<input type="text" class="span6" name="name" value="" required>
										<p class="help-block">Program name</p>
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

