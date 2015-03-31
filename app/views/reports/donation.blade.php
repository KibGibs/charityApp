@extends('layout.layout')

@section('content')
<div class="container">

	<div class="widget-header">
		<i class="icon-money"></i>
		<h3>{{$name->last_name}}, {{$name->first_name}}</h3>
	</div> 

	<div class="widget-content">

		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th> Activity Name </th>
					<th> Count </th>
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

