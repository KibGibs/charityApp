@extends('layout.layout')

@section('content')
<div class="container">
 <a href="{{ URL::action('ActivityController@getIndexAdd') }}" role="button" class="btn btn-primary">Add Activity</a>
 <a href="{{ URL::action('ActivityController@getIndexSubActivity') }}" role="button" class="btn btn-primary">Add Sub Activity</a>
	<br /><br />
	@if(Session::has('success'))
	<div class="alert alert-success">
		{{Session::get('success')}}
	</div>
	@endif
	@if(Auth::user()->isADmin())
		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th> ID </th>
					<th> Name </th>
					<th class="td-actions">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($activity as $key => $v)
					<tr>
						<td class="span2"> {{$v->id}} </td>
						<td class="span8"> {{$v->name}} </td>
						<td class="td-actions span2">
							<a href="{{URL::action('ActivityController@getActivityDetail', ['id' => $v->id])}}" class="btn btn-small btn-info" data-toggle="tooltip" data-placement="top" title="Activity Details"><i class="btn-icon-only icon-list-alt"> </i></a>
							<a href="{{ URL::action('ActivityController@getIndexAdd', ['id' => $v->id ]) }}" class="btn btn-small btn-success"><i class="btn-icon-only icon-edit" data-toggle="tooltip" data-placement="top" title="Edit"> </i></a>
							<a href="{{ URL::action('ActivityController@delete', ['id' => $v->id ]) }}" class="btn btn-danger btn-small" data-toggle="tooltip" data-placement="top" title="Delete"><i class="btn-icon-only icon-remove"> </i></a>
						</td>
					</tr>
				@endforeach
			<tr>
			</tbody>
		</table>
	@endif

</div>
@stop

