@extends('layout.layout')

@section('content')
<div class="container">

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
	      <div class="row">
	      	
	      	<div class="span12">      		
	      		
	      		<div class="widget">
	      			
	      			<div class="widget-header">
	      				<i class="icon-paste"></i>
	      				<h3>Donate</h3>
	  				</div> <!-- /widget-header -->
					
					<div class="widget-content">
						{{Form::open(array('action' => 'DonationController@postDonateDetail','class' => 'form-horizontal'))}}
						<!-- <form id="edit-profile" class="form-horizontal"> 
						-->
							<fieldset>
								<input type="hidden" value="{{$id}}" name="id">
								<div class="control-group">											
									<label class="control-label" for="activity">Activity</label>
									<div class="controls">
										<select name="activity" id="">
											@foreach($activity as $k=>$v)
												<option value="{{ $v->id }}">{{ $v->name }}</option>
											@endforeach
										</select>
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
									<th> Activity </th>
									<th class="td-actions">Action</th>
								</tr>
							</thead>
							<tbody>

								@foreach($donation_detail as $key => $v)
									<tr>
										<td class="span2"> {{$v->id}} </td>
										<td class="span8"> {{$v->activity->name}} </td>
										<td class="td-actions span2">
											<a href="{{ URL::action('DonationController@deleteDetail', ['donate' => $id, 'detail' => $v->id ]) }}" class="btn btn-danger btn-small" data-toggle="tooltip" data-placement="top" title="Delete"><i class="btn-icon-only icon-remove"> </i></a>
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

