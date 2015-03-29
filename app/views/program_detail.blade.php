@extends('layout.layout')

@section('content')
<div class="container">
 <a href="{{ URL::action('ProgramController@addProgramDetail', ['id' => $id]) }}" role="button" class="btn btn-primary">Add Program Detail</a>
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
					<th> Activtity </th>
					<th> Sub Activity </th>
					<th> Cost </th>
					<th> Quantity </th>
					<th> Start </th>
					<th> End </th>
					<th class="td-actions">Action</th>
				</tr>
			</thead>
			<tbody>
			@foreach($program_detail as $key => $v)
					<tr>
						<td class="span2"> {{$v->id}} </td>
						<td class="span2"> {{$v->program_id}} </td>
						<td class="span2"> {{$v->activity_detail_id}} </td>
						<td class="span2"> {{$v->activity_detail_id}} </td>
						<td class="span2"> {{$v->cost}} </td>
						<td class="span2"> {{$v->qty}} </td>
						<td class="span2"> {{$v->start_date}} </td>
						<td class="span2"> {{$v->end_date}} </td>
						<td class="td-actions span2">
							<a href="{{ URL::action('ActivityController@deleteActivityDetail', ['activity' => $v->id ]) }}" class="btn btn-danger btn-small" data-toggle="tooltip" data-placement="top" title="Delete"><i class="btn-icon-only icon-remove"> </i></a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	@endif
	
</div>
@stop

