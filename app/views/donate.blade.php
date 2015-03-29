@extends('layout.layout')

@section('content')
<div class="container">

	
	      <div class="row">
	      	
	      	<div class="span12">      		
	      		
	      		<div class="widget">
	      			
	      			<div class="widget-header">
	      				<i class="icon-paste"></i>
	      				<h3>Donate</h3>
	  				</div> <!-- /widget-header -->
					
					<div class="widget-content">
						{{Form::open(array('action' => 'DonationController@postDonate','class' => 'form-horizontal'))}}
						<!-- <form id="edit-profile" class="form-horizontal"> 
						-->
							<fieldset>
								
								<div class="control-group">											
									<label class="control-label" for="amount">Donation Amount</label>
									<div class="controls">
										<input type="number" step="any" class="span6" name="amount" value="" required>
									</div> <!-- /controls -->				
								</div> <!-- /control-group -->
								
								<div class="control-group">											
									<label class="control-label" for="date">Donation Date</label>
									<div class="controls">
										<input type="date" class="span6" name="date" value="" required>
										<p class="help-block">"mm/dd/yyyy" format</p>
									</div> <!-- /controls -->				
								</div> <!-- /control-group -->

								<div class="control-group">											
									<label class="control-label" for="remarks">Remarks</label>
									<div class="controls">
									<textarea class="form-control span6" rows="6" name="remarks"></textarea>
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

