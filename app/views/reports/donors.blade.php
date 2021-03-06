@extends('layout.layout')

@section('content')
<div class="container">

	<div class="widget-header">
		<i class="icon-money"></i>
		<h3>Donor's Summary</h3>
	</div> 

	<div class="widget-content">

		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th> Name </th>
					<th> Count </th>
					<th> Amount </th>
				</tr>
			</thead>
			<tbody>
				<?php $grand_total = 0; ?>
				@foreach($results as $key => $v)
					<tr>
						<td class="span2"><a href="{{URL::action('Reports@getDonation', ['program' => $v->id])}}" > {{$v->user->last_name}}, {{$v->user->first_name}}</a> </td>
						<td class="span2"> {{$v->count}} </td>
						<td class="span2">PHP {{number_format($v->total,2)}} </td>
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

