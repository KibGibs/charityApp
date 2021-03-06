@extends('layout.layout')

@section('content')
<div class="container">

	<div class="widget-header">
		<i class="icon-calendar"></i>
		<h3>Program Report</h3>
	</div> 

	<div class="widget-content">

		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th> Program </th>
					<th> Status </th>
					<th> Amount Total </th>
				</tr>
			</thead>
			<tbody>
				<?php $grand_total = 0; ?>
				@foreach($results as $key => $v)
					<tr>
						<td class="span2"><a href="{{URL::action('Reports@getActivity', ['program' => $v->program_id])}}" >{{$v->program->name}}</a></td>
						<td class="span2"> 
						@if($v->status == 0)
						Ongoing
						@else
						Done
						@endif

						</td>
						<td class="span2 "> PHP {{number_format($v->total,2)}} </td>
						<?php $grand_total += $v->total; ?>
					</tr>
				@endforeach
					<tr>
						<td class="span2" colspan="2" style="text-align:right;">Total: </td>
						<td> PHP {{number_format($grand_total,2)}}</td>
					</tr>
			</tbody>
		</table>
		{{$results->links()}}
	</div>
</div>
@stop

