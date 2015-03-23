@extends('layout.layout')

@section('content')
<div class="container">
<a href="{{URL::action('HomeController@addUser')}}"><button type="submit" class="btn btn-primary">Add Program</button></a><br /><br />
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
				
			<tr>
			</tbody>
		</table>
	@endif
</div>
@stop

