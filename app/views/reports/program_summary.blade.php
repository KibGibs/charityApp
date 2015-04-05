@extends('layout.layout')

@section('content')
<div class="container">

	<div class="widget-header">
		<i class="icon-calendar"></i>
		<h3>Program Summary</h3>
	</div> 

	<div class="widget-content">

		<table class="table table-striped table-bordered">
			<thead>
				<th>Program Name</th>
			</thead>
			<tbody>
				@foreach($program as $k => $v)
					<tr>
						<td><a href="{{URL::action('Reports@getSummary', ['program' => $v->id])}}" >{{$v->name}}</a></td>
						</tr>
				@endforeach
			</tbody>
		</table>

	</div>
</div>
@stop

