@extends('layout.layout')

@section('content')
<div class="container">

	
	      <div class="row">
	      	
	      	<div class="span12">      		
	      		
	      		<div class="widget">
	      			
	      			<div class="widget-header">
	      				<i class="icon-globe"></i>
	      				<h3>
	      				@if($name == '')
	      				Add
	      				@else
	      				Edit
	      				@endif
	      				 
	      				Barangay
	      				</h3>
	  				</div> <!-- /widget-header -->
					
					<div class="widget-content">
						{{Form::open(array('action' => 'BarangayController@save','class' => 'form-horizontal'))}}
						<!-- <form id="edit-profile" class="form-horizontal"> -->
							<input type="hidden" value="{{ $id }}" name="id"/>
							<fieldset>
								<div class="control-group">											
									<label class="control-label" for="username">Name</label>
									<div class="controls">
										<input type="text" class="span6" name="name" value="{{ $name }}" required>
										<p class="help-block">Barangay name</p>
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

