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
	      				<h3>Sub Activity</h3>
	  				</div> <!-- /widget-header -->

					<div class="widget-content">
								@if(Session::has('success'))
									<div class="alert alert-success">
										{{Session::get('success')}}
									</div>
									@endif
								{{Form::open(array('action' => 'ActivityController@saveSubActivity','class' => 'form-horizontal'))}}
								<!-- <form id="edit-profile" class="form-horizontal"> -->
									<input type="hidden" value="{{ $id }}" name="id"/>
									<fieldset>
										<div class="control-group">											
											<label class="control-label" for="username">Name</label>
											<div class="controls">
												<input type="text" class="span6" name="name" value="{{$name}}" required>
												<p class="help-block">Sub Activity Name</p>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->

		
										<div class="form-actions">
											<button type="submit" class="btn btn-primary">Save</button> 
										</div> <!-- /form-actions -->
									</fieldset>
								</form>
						
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
									<th> ID </th>
									<th> Name </th>
									<th class="td-actions">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($sub_activity as $key => $v)
									<tr>
										<td class="span2"> {{$v->id}} </td>
										<td class="span8"> {{$v->name}} </td>
										<td class="td-actions span2">
											<a href="{{ URL::action('ActivityController@getIndexSubActivity', ['id' => $v->id ]) }}" class="btn btn-small btn-success"><i class="btn-icon-only icon-edit" data-toggle="tooltip" data-placement="top" title="Edit"> </i></a>
											<a href="{{ URL::action('ActivityController@deleteSubActivity', ['id' => $v->id ]) }}" class="btn btn-danger btn-small" data-toggle="tooltip" data-placement="top" title="Delete"><i class="btn-icon-only icon-remove"> </i></a>
										</td>
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

