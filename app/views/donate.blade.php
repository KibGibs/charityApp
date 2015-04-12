@extends('layout.layout')

@section('content')
<div class="container" data-ng-app="app" data-ng-controller="donationCtrl" ng-cloak>

	
	      <div class="row">
	      	
	      	<div class="span12">      		
	      		
	      		<div class="widget">
	      			
	      			<div class="widget-header">
	      				<i class="icon-paste"></i>
	      				<h3>Donate</h3>
	  				</div> <!-- /widget-header -->
					
					<div class="widget-content">
						<div class="alert alert-success" ng-show="success">
									Donation Added.
						</div>
						<form ng-submit="submitDonation()" class="form-horizontal">
							<fieldset>
								<div class="control-group">											
									<label class="control-label" for="username">Program</label>
									<div class="controls">
										<select class="form-control span5" required 
												ng-model="donate.program" 
												name="program"
												ng-options="p.id as p.name for p in programs" 
												ng-change="selectedProgram(donate.program)">
												<option value="">-- Select --</option>
																				
										</select>
									</div> <!-- /controls -->				
								</div> <!-- /control-group -->
								<div class="control-group">											
									<label class="control-label" for="username">Activity</label>
									<div class="controls">
										<select class="form-control span5" required 
												ng-model="donate.activity" 
												name="activity"
												ng-options="a.id as a.name for a in activities"
												ng-disabled="loading" >
												<option value="">@{{loading?'Loading...':'-- Select --'}}</option>
																				
										</select>
									</div> <!-- /controls -->				
								</div> <!-- /control-group -->
								<div class="control-group">											
									<label class="control-label" for="amount">Donation Amount</label>
									<div class="controls">
										<input ng-model="donate.amount" min="1" type="number" step="any" class="span6" name="amount" value="" required>
									</div> <!-- /controls -->				
								</div> <!-- /control-group -->
							

								<div class="control-group">											
									<label class="control-label" for="remarks">Remarks</label>
									<div class="controls">
									<textarea ng-model="donate.remarks" class="form-control span6" rows="6" name="remarks"></textarea>
									</div> <!-- /controls -->				
								</div> <!-- /control-group -->
								<div class="form-actions">
									<button type="submit" class="btn btn-primary">Donate</button> 
								</div> <!-- /form-actions -->
							</fieldset>
						</form>
					</div> <!-- /widget-content -->
						
				</div> <!-- /widget -->
	      		
		    </div> <!-- /span12 -->
	      </div> <!-- /row -->
</div>
@stop
@section('scripts')
	<script type="text/javascript">
	var vars = {{json_encode(
		array(
			'programs'=>$programs,
			'get_activity_url'=> URL::action('DonationController@getActivity', [':id:']),
			'post_donation_detail'=> URL::action('DonationController@postDonate'),
		)
	)}};
	</script>
	{{ HTML::script(asset('assets/js/module/donation.js')) }}
@stop
