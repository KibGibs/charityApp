@extends('layout.layout')

@section('content')
<div class="container">
		
		  <a href="{{ URL::action('ActivityController@getIndex') }}" role="button" class="btn btn-primary">View Activities</a>
		  <br /><br />
	      <div class="row">
	      	
	      	<div class="span12">      		
	      		
	      		<div class="widget">
	      			
	      			<div class="widget-header">
	      				<i class="icon-tasks"></i>
	      				<h3>Activity Details</h3>
	  				</div> <!-- /widget-header -->

					<div class="widget-content">
								@if(Session::has('success'))
									<div class="alert alert-success">
										{{Session::get('success')}}
									</div>
								@endif
								@if(Session::has('Error'))
									<div class="alert alert-danger">
										{{Session::get('Error')}}
									</div>
								@endif
								@if(!Auth::user()->isDonor())
								{{Form::open(array('action' => 'ActivityController@saveActivityDetail','class' => 'form-horizontal'))}}
								<!-- <form id="edit-profile" class="form-horizontal"> -->
									<fieldset>
										<input type="hidden" value="{{ $activity }}" name="activity"/>
										<div class="control-group">											
											<label class="control-label" for="username">Sub Activity</label>
											<div class="controls">
												<select name="sub_activity" class="span5" id="sub_activity">
													@foreach($sub_activity as $k=>$v)
													<option value="{{$v->id}}">{{$v->name}}</option>
													@endforeach
												</select>
												<p class="help-block">Sub Activity Name</p>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->

		
										<div class="form-actions">
											<button type="submit" class="btn btn-primary">Save</button> 
										</div> <!-- /form-actions -->
									</fieldset>
								</form>
								@endif
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
									<th> ID </th>
									<th> Sub Activity </th>
									@if(!Auth::user()->isDonor())
										<th class="td-actions">Action</th>
									@endif
								</tr>
							</thead>
							<tbody>
								@foreach($activity_detail as $key => $v)
									<tr>
										<td class="span2"> {{$v->id}} </td>
										<td class="span8"> {{$v->sub_activity_id->name}} </td>
										@if(!Auth::user()->isDonor())
										<td class="td-actions span2">
											<a href="{{ URL::action('ActivityController@deleteActivityDetail', ['activity' => $v->id ]) }}" class="btn btn-danger btn-small" data-toggle="tooltip" data-placement="top" title="Delete"><i class="btn-icon-only icon-remove"> </i></a>
										</td>
										@endif
									</tr>
								@endforeach
							<tr>
							</tbody>
						</table>			
					</div> <!-- /widget-content -->
						
				</div> <!-- /widget -->
	      		
				
		    </div> <!-- /span12 -->
	      </div> <!-- /row -->
</div>
@stop

