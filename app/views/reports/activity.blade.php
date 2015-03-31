@extends('layout.layout')

@section('content')
<div class="container">

	<div class="widget-header">
		<i class="icon-tasks"></i>
		<h3>Program Details</h3>
	</div> 

	<div class="widget-content">

		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th> Activity Name </th>
					<th> Total </th>
				</tr>
			</thead>
			<tbody>

				@foreach($results as $key => $v)
					<tr>
						<td>{{$v->name}}</td>
						<td>{{$v->count}}</td>
					</tr>
				@endforeach

			</tbody>
		</table>

	</div>
</div>
@stop

