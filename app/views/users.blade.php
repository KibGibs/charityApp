@extends('layout.layout')

@section('content')
<div class="container">
<a href="{{URL::action('HomeController@addUser')}}"><button type="submit" class="btn btn-primary">Add user</button></a><br /><br />
	@if(Auth::user()->isADmin())
		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th> Username </th>
					<th> Name </th>
					<th> Active </th>
					<th> User Type </th>
					<th class="td-actions">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($users as $key => $v)
					<tr>
						<td> {{$v->username}} </td>
						<td> {{$v->last_name}}, {{$v->first_name}} </td>
						<td>
							@if($v->status == 0 )
								Yes
							@else
								No
							@endif
						</td>
						<td> {{$v->user_type}} </td>
						<td class="td-actions">
							<a href="{{URL::action('HomeController@editUser', ['id' => $v->id])}}" class="btn btn-small btn-success"><i class="btn-icon-only icon-edit"> </i></a>
							<a href="javascript:;" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a>
						</td>

					</tr>
				@endforeach
	
			<tr>
			</tbody>
		</table>
	@endif
</div>
@stop

