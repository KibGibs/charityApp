@extends('layout.layout')

@section('content')
<div class="container">

	<div class="widget-header">
		<i class="icon-calendar"></i>
		<h3>Program Summary</h3>
	</div> 

	<div class="widget-content">

	<h3>Program: {{$name->name}}</h3>
	<h3>Activities:</h3>
	<ul>
		@foreach($activity as $k => $v)
			<li style="font-size:18px;">{{$v->name}}</li>
		@endforeach
	</ul>
	<h3>Beneficiaries</h3>
	<ul>
		@foreach($barangay as $k => $v)
			<li style="font-size:18px;">{{$v->name}}</li>
		@endforeach
	</ul>
	<h3>Duration: 

	@foreach($min_date as $k => $v)
		{{date("M-d Y", strtotime($v->min_date))}}
	@endforeach
	To
	@foreach($max_date as $k => $v)
		{{date("M-d Y", strtotime($v->max_date))}}
	@endforeach

	</h3>
	<h3>Total: 
	@foreach($total as $k => $v)
		PHP {{number_format($v->total,2)}}
	@endforeach
	</h3>
	<h3>Status: 
		@if($name->status == 0)
		Ongoing
		@else
		Done
		@endif 
	</h3>
		<table class="table table-striped table-bordered">
			<thead>
				<th>Sub Activity</th>
				<th>Qty</th>
				<th>Amount</th>
				<th>Start Date</th>
				<th>End Date</th>
			</thead>
			<tbody>
				@foreach($sub_activity as $k => $v)
					<tr>
						<td>{{$v->name}}</td>
						<td>{{$v->qty}}</td>
						<td>PHP {{number_format($v->cost,2)}}</td>
						<td>{{$v->start_date}}</td>
						<td>{{$v->end_date}}</td>
					</tr>
				@endforeach
			</tbody>
		</table>

	</div>
</div>
@stop

