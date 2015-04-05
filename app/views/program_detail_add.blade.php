@extends('layout.layout')

@section('content')
<div class="container" data-ng-app="app" data-ng-controller="programCtrl" ng-cloak>
		 <a href="{{ URL::action('ProgramController@getProgramDetail', ['id' => $id]) }}" role="button" class="btn btn-primary">View Program Detail</a>
			<br /><br />
	      <div class="row">
	      	
	      	<div class="span12">      		
	      		
	      		<div class="widget ">
	      			
	      			<div class="widget-header">
	      				<i class="icon-calendar"></i>
	      				<h3>{{$program->name}}</h3>
	  				</div> <!-- /widget-header -->
					
					<div class="widget-content">
								<div class="alert alert-success" ng-show="success">
									Program Detail Added.
								</div>
								<div class="alert alert-danger" ng-show="error">
									Program Detail already Exist.
								</div>
								<form id="edit-profile" class="form-horizontal" ng-submit="add()">
									<fieldset>
										<div class="control-group">											
											<label class="control-label" for="barangay">Barangay</label>
											<div class="controls">
													<select class="form-control span5"  required
														ng-model="program.barangay" 
														ng-options="bg.id as bg.name for bg in barangay" >
														<option value="">-- Select --</option>																							
													</select>
											
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										<div class="control-group">											
											<label class="control-label" for="username">Activity</label>
											<div class="controls">
												<select class="form-control span5" required 
														ng-model="program.activity" 
														ng-options="ac.id as ac.name for ac in activity" 
														ng-change="selectedActivity(program.activity)">
														<option value="">-- Select --</option>
																						
												</select>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										<div class="control-group">											
											<label class="control-label" for="username">Sub Activity</label>
											<div class="controls">
												<select class="form-control span5" required
														ng-model="program.subActivity" 
														ng-options="sac.sub_activity_id.id as sac.sub_activity_id.name for sac in subActivity" 
														ng-disabled="loading">
														<option value="">@{{loadingCounty?'Loading...':'-- Select --'}}</option>
												</select>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										<div class="control-group">											
											<label class="control-label" for="username">Start Date</label>
											<div class="controls">
												<datepicker ng-model="dt_start" min-date="minDate_start" show-weeks="true" class="well well-sm" style="width: 400px;"></datepicker>
												</p>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										<div class="control-group">											
											<label class="control-label" for="username">End Date</label>
											<div class="controls">
												<datepicker ng-model="dt_end" min-date="minDate_end" show-weeks="true" class="well well-sm" style="width: 400px;"></datepicker>

											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										<div class="control-group">											
											<label class="control-label" for="firstname">Cost</label>										
											<div class="controls">
												<input min="1" class="span6" value="" type="number" style="height: 30px; " ng-model="program.cost" required>
											</div> <!-- /controls -->
										</div>
										
											<div class="control-group">											
											<label class="control-label" for="firstname">Quantity</label>										
											<div class="controls">
												<input min="1" class="span6" value="" type="number" style="height: 30px; " ng-model="program.qty" required>
											</div> <!-- /controls -->
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

@section('scripts')
	<script type="text/javascript">
	var vars = {{json_encode(
		array(
			'barangay'=>$barangay,
			'activity'=>$activity,
			'program'=>$program,
			'get_sub_activity_url'=> URL::action('ProgramController@getSubActivity', [':id:']),
			'post_program_detail'=> URL::action('ProgramController@postProgramDetail'),
		)
	)}};
	</script>
	{{ HTML::script(asset('assets/js/module/program.js')) }}
@stop