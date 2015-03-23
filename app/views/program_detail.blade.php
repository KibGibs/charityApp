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

