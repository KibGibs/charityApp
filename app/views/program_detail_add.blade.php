@extends('layout.layout')

@section('content')
<div class="container">

	
	      <div class="row">
	      	
	      	<div class="span12">      		
	      		
	      		<div class="widget ">
	      			
	      			<div class="widget-header">
	      				<i class="icon-user"></i>
	      				<h3>{{$program->name}}</h3>
	  				</div> <!-- /widget-header -->
					
					<div class="widget-content">
							
								<form id="edit-profile" class="form-horizontal">
									<fieldset>
										<div class="control-group">											
											<label class="control-label" for="username">Barangay</label>
											<div class="controls">
												<select name="barangay" class="span5" id="username">
													@foreach($barangay as $k=>$v)
													<option value="{{$v->id}}">{{$v->name}}</option>
													@endforeach
												</select>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										<div class="control-group">											
											<label class="control-label" for="firstname">Cost</label>										
											<div class="controls">
											   <div class="input-prepend input-append">
												  <span class="add-on">PHP</span>
												  <input class="span4" id="appendedPrependedInput" type="text">
												</div>
											</div>
										</div>

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

