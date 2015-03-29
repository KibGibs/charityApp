@extends('layout.layout')

@section('content')
<div class="container">
@if(Auth::user()->isADmin())
<a href="{{URL::action('HomeController@addUser')}}"><button type="submit" class="btn btn-primary">Add user</button></a><br /><br />
	@if(Session::has('success'))
	<div class="alert alert-success">
		{{Session::get('success')}}
	</div>
	@endif

	<div class="widget-header">
		<i class="icon-user"></i>
		<h3>User List</h3>
	</div> <!-- /widget-header -->

	<div class="widget-content">
	
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
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	@endif
	</div>
</div>
@stop

