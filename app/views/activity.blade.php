@extends('layout.layout')

@section('content')
<div class="container">
	@if(!Auth::user()->isDonor())
	 <a href="{{ URL::action('ActivityController@getIndexAdd') }}" role="button" class="btn btn-primary">Add Activity</a>
	 <a href="{{ URL::action('ActivityController@getIndexSubActivity') }}" role="button" class="btn btn-primary">Add Sub Activity</a>
	@endif
	<br /><br />
	@if(Session::has('success'))
	<div class="alert alert-success">
		{{Session::get('success')}}
	</div>
	@endif

	<div class="widget-header">
		<i class="icon-tasks"></i>
		<h3>Activity List</h3>
	</div> 

	<div class="widget-content">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th> ID </th>
						<th> Name </th>
						<th> Status </th>
						<th class="td-actions">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($activity as $key => $v)
						<tr>
							<td class="span2"> {{$v->id}} </td>
							<td class="span6"> {{$v->name}} </td>
							<td class="span2"> 
								@if($v->status == 0)
									<a href="{{URL::action('ActivityController@getToggleStatus', ['program' => $v->id])}}" class="btn btn-small btn-warning">Ongoing</a>
								@else
									<a href="{{URL::action('ActivityController@getToggleStatus', ['program' => $v->id])}}" class="btn btn-small btn-success">Done</a>
								@endif
							</td>
							<td class="td-actions span2">
								<a href="{{URL::action('ActivityController@getActivityDetail', ['id' => $v->id])}}" class="btn btn-small btn-info" data-toggle="tooltip" data-placement="top" title="Activity Details"><i class="btn-icon-only icon-list-alt"> </i></a>
								@if(!Auth::user()->isDonor())
								<a href="{{ URL::action('ActivityController@getIndexAdd', ['id' => $v->id ]) }}" class="btn btn-small btn-success"><i class="btn-icon-only icon-edit" data-toggle="tooltip" data-placement="top" title="Edit"> </i></a>
								<a href="{{ URL::action('ActivityController@delete', ['id' => $v->id ]) }}" class="btn btn-danger btn-small" data-toggle="tooltip" data-placement="top" title="Delete"><i class="btn-icon-only icon-remove"> </i></a>
								@endif
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		{{$activity->links()}}
	</div>
</div>
@stop

