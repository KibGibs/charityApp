@extends('layout.layout')

@section('content')
<div class="container">
	@if(!Auth::user()->isDonor())
	<a href="{{ URL::action('ProgramController@addProgramDetail', ['id' => $id]) }}" role="button" class="btn btn-primary">Add Program Detail</a>
	@endif
	<br /><br />
	@if(Session::has('success'))
	<div class="alert alert-success">
		{{Session::get('success')}}
	</div>
	@endif

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
					@if(!Auth::user()->isDonor())
					<th class="td-actions">Action</th>
					@endif
				</tr>
			</thead>
			<tbody>
			@foreach($program_detail as $key => $v)
					<tr>
						<td class="span2"> {{$v->id}} </td>
						<td class="span2"> {{$v->program->name}} </td>
						<td class="span2"> {{$v->activity_detail->activity->name}} </td>
						<td class="span2"> {{$v->activity_detail->subActivity->name}} </td>
						<td class="span2">PHP {{ number_format($v->cost, 2) }} </td>
						<td class="span2"> {{ $v->qty}} </td>
						<td class="span2"> {{$v->start_date}} </td>
						<td class="span2"> {{$v->end_date}} </td>
						@if(!Auth::user()->isDonor())
						<td class="td-actions span2">
							<a href="{{ URL::action('ProgramController@deleteDetail', ['program'=>$id,'detail' => $v->id ]) }}" class="btn btn-danger btn-small" data-toggle="tooltip" data-placement="top" title="Delete"><i class="btn-icon-only icon-remove"> </i></a>
						</td>
						@endif
					</tr>
				@endforeach
			</tbody>
		</table>
	
</div>
@stop

